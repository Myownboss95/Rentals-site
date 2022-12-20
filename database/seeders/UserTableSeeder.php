<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'is_admin'=> 1,
            'email_verified_at' => now(),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
        ]);
    }
}
