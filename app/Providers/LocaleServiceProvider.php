<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'front.template.header',
            'front2.template.header'
        ], function ($view) {
            $languages = [
                [
                    'name' => 'English',
                    'short_name' => 'en',
                    'flag' => 'us.jpg',
                ],
                [
                    'name' => 'Spanish',
                    'short_name' => 'es',
                    'flag' => 'spain.jpg',
                ],
                [
                    'name' => 'German',
                    'short_name' => 'de',
                    'flag' => 'germany.jpg',
                ],
                [
                    'name' => 'Italian',
                    'short_name' => 'it',
                    'flag' => 'italy.jpg',
                ]
            ];
            $activeLanguage = [];
            foreach ($languages as $k => $language) {
                if ($language['short_name'] == app()->getLocale()) {
                    $activeLanguage = $language;
                    break;
                }
            }
            return $view->with('languages', $languages)
                ->with('active_language', $activeLanguage);
        });
    }
}
