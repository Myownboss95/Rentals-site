<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'status' => fake()->randomElement(['active', 'pending', 'suspended']),
            'country' => 'Nigeria',
            'state' => fake()->randomElement(['Delta', 'Lagos', 'Abuja', 'Bayelsa', 'Rivers']),
            'city' => fake()->randomElement(['Asaba', 'Ikeja', 'Yenegoa', 'Warri', 'Abraka', 'Bomadi']),
            'address' => fake()->address(),
            'zip_code' => fake()->postcode(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function user()
    {
        return $this->state(
            fn () => [
                'email' => 'user@binotomo.test',
                'status' => 'active'
            ]
        );
    }

    public function admin()
    {
        return $this->state(
            fn () => [
                'is_admin' => 1,
                'email' => 'admin@binotomo.test',
                'status' => 'active'
            ]
        );
    }
}
