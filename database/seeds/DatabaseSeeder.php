<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MemberSeeder::class);
         $this->call(RegisterWriterSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(StorySeeder::class);
         $this->call(AnnounceSeeder::class);
         $this->call(HistoryCashCardSeeder::class);
    }
}
