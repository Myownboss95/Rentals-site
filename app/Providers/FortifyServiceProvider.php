<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Http\Responses\LoginResponse as ResponsesLoginResponse;
use App\Http\Responses\LogoutResponse as ResponsesLogoutResponse;
use App\Http\Responses\PasswordResetResponse as ResponsesPasswordResetResponse;
use App\Http\Responses\VerifyEmailResponse as ResponsesVerifyEmailResponse;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\PasswordResetResponse;
use Laravel\Fortify\Contracts\VerifyEmailResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapActions();
        $this->mapViews();
        $this->mapPipeline();
        $this->mapLimiters();
        $this->mapResponses();
    }

    private function mapActions()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
    }

    private function mapViews()
    {
        Fortify::loginView(fn () => inertia('auth.login'));
        Fortify::registerView(fn () => inertia('auth.register'));

        Fortify::resetPasswordView(fn () => inertia('auth.password.reset'));

        Fortify::requestPasswordResetLinkView(fn () => inertia('auth.password.forgot'));

        Fortify::verifyEmailView(fn () => inertia('auth.email.verify'));

        Fortify::confirmPasswordView(fn () => inertia('auth.confirm-password'));

        Fortify::twoFactorChallengeView(fn () => inertia('auth.two-factor-challenge'));

    }

    private function mapPipeline()
    {
        Fortify::authenticateThrough(function (Request $request) {
            return array_filter([
                config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
                Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
                AttemptToAuthenticate::class,
                PrepareAuthenticatedSession::class,
            ]);
        });
    }

    private function mapLimiters()
    {
        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    private function mapResponses()
    {
        $this->app->bind(LoginResponse::class, ResponsesLoginResponse::class);
        $this->app->bind(LogoutResponse::class, ResponsesLogoutResponse::class);
        $this->app->bind(VerifyEmailResponse::class, ResponsesVerifyEmailResponse::class);
        $this->app->bind(PasswordResetResponse::class, ResponsesPasswordResetResponse::class);
    }
}
