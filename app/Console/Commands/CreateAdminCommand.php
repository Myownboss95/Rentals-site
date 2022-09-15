<?php

namespace App\Console\Commands;

use App\Models\User;
use Hash;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Str;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $first_name, $last_name, $email, $password;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Welcome to the admin create command');
        $this->first_name = $this->ask('What is your first name?');
        $this->last_name = $this->ask('What is your last name?');
        $this->getEmail();
        $this->getPassword();
        DB::beginTransaction();
        try {
            $user = new User();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->email_verified_at = now();
            $user->password = Hash::make($this->password);
            $user->is_admin = 1;
            $user->save();
            DB::commit();
            $this->info("Dear $user->first_name, your admin account has been created");
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->error('Ooops! an unexpected error occured.');
            //throw $th;
        }
    }

    private function getEmail()
    {
        for ($i = 0; $i < 3; $i++) {
            $this->email = $this->ask('What is your email?');
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->warn('Not an email address try again');
                continue;
            }
            if (User::whereEmail($this->email)->exists()) {
                $this->warn('The email address is taken.');
                continue;
            }
            return;
        }
        exit(0);
    }


    private function getPassword()
    {
        for ($i = 0; $i < 3; $i++) {
            $this->password = $this->secret('Enter your password?');
            if (Str::length($this->password) < 6) {
                $this->warn('Password cannot be less than 3 or empty');
                continue;
            }
            return;
        }
        exit(0);
    }
}
