<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Listing;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{

    protected $model = \App\Models\Listing::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        $levels = ['Entry Level', 'Mid Level', 'Senior Level'];
        $types = ['Full-time', 'Part-time', 'Contract'];
        return [
            'title' => fake()->jobTitle(),
            'department' => fake()->jobTitle(),
            'description' => fake()->sentence(),
            // 'type' => fake()->randomElement($types),
            'type' => 'Full-time',
            // 'level' => fake()->randomElement($levels),
            'level' => 'Entry Level',
            // 'experience' => faker()->numberBetween(1, 20),
            'experience' => 20,
            // 'salary' => fake()->randomNumber(5, 100000),
            'salary' => 1000,
            'phone' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'image' => '',
        ];
    }
}
