<?php

namespace App\Console\Commands;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Console\Command;
use Faker\Factory as Faker;

class GenerateFixtures extends Command
{
    protected $signature = 'app:generate-fixtures {--animals-num=} {--truncate=0}';
    protected $description = 'Generate random fixtures for animals and categories';


    public function handle()
    {
        $animalsNum = $this->option('animals-num');
        $truncate = $this->option('truncate');

        if ($truncate) {
            Animal::truncate();
        }

        // Create 3 categories
        $categories = [];
        for ($i = 0; $i < 3; $i++) {
            $categories[] = Category::create(['name' => 'Category ' . ($i + 1)]);
        }

        $faker = Faker::create();
        for ($i = 0; $i < $animalsNum; $i++) {
            Animal::create([
                'name' => $faker->word,
                'description' => $faker->text(1000),
                'weight' => $faker->numberBetween(1, 10000),
                'created_at' => $faker->dateTime,
                'category_id' => $categories[array_rand($categories)]->id,
            ]);
        }

        $this->info("$animalsNum animals have been generated.");
    }
}
