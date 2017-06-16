<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 0; $i <= 4; $i++) {
            Category::create([
                'category_name' => $faker->city,
                'status_alert' => 0
            ]);
        }
    }
}
