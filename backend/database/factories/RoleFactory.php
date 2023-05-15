<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['Admin', 'Manager', 'User']);
        $slug = fake()->randomElement(['admin', 'manager', 'user']);
        return [
            'role' => $role,
            'slug' => $slug,
        ];
    }
}
