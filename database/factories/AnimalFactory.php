<?php

namespace Database\Factories;

use App\Models\Animal;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();
        return [
            'name' => ucfirst($faker->word),
            'description' => ucfirst($faker->text(1000)),
            'weight' => $faker->numberBetween(1, 10000),
            'created_at' => $faker->dateTime,
        ];
    }
}
