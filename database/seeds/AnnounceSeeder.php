<?php

use App\Announce;
use App\Member;
use Illuminate\Database\Seeder;

class AnnounceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 1; $i <= 5; $i++) {
            $member = Member::find($i);
            Announce::create([
                'member_id' => $member->id,
                'announce_title' => $faker->sentence,
                'announce_detail' => $faker->text,
                'status_comment' => rand(0, 1)
            ]);
        }
    }
}
