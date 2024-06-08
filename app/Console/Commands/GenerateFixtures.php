<?php

namespace App\Console\Commands;

use App\Models\Animal;
use App\Models\Category;
use Illuminate\Console\Command;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Sequence;
use function Webmozart\Assert\Tests\StaticAnalysis\inArray;
use function Webmozart\Assert\Tests\StaticAnalysis\length;

class GenerateFixtures extends Command
{
    protected $signature = 'app:generate-fixtures {--animals-num=} {--truncate=0}';
    protected $description = 'Generate random fixtures for animals and categories';


    public function handle()
    {
        $animalsNum = $this->option('animals-num');
        $truncate = $this->option('truncate');
        $categoriesNum = 3;

        if ($animalsNum <= '0' || $animalsNum > '100') {
            $this->error("'animals-num' option must have a value greater than 0 and less than or equal to 100.");
            return 1;
        }
        if (!empty($truncate) && ($truncate !== '1' && $truncate !== '0')) {
            $this->error("'truncate' option must have a value of 0 or 1.");
            return 1;
        }

        if ($truncate) {
            Animal::truncate();
            $this->info("Animals table truncated.");
        }

        Category::factory()->count($categoriesNum)->create();

        $allCategoryIds = Category::pluck("id")->toArray();
        if (count($allCategoryIds) <= 0) {
            $this->warn("There are no available categories to reference in animals.");
            return 1;
        }

        Animal::factory()
                ->count($animalsNum)
                ->sequence(fn (Sequence $sequence) => ['category_id' => $allCategoryIds[array_rand($allCategoryIds)]])
                ->create();

        if ($animalsNum == 1) {
            $this->info("A lonely animal has been generated.");
        }
        else {
            $this->info("$animalsNum animals have been generated.");
        }
    }
}
