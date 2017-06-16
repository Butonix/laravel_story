<?php

use App\Story;
use App\Tag;
use App\SubStory;
use App\Member;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
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
            $story = Story::create([
                'member_id' => $member->id,
                'category_id' => rand(1, 5),
                'story_name' => $faker->sentence,
                'story_author' => $member->author,
                'story_outline' => $faker->paragraph,
                'story_picture' => '345033480.png',
                'status_ban' => 0,
                'status_public' => 1,
                'status_comment' => 1,
                'count_visitor' => 0,
                'count_like' => 0
            ]);
            Tag::create([
                'story_id' => $story->id
            ]);

            for ($j = 0; $j <= 3; $j++) {
                SubStory::create([
                    'story_id' => $story->id,
                    'story_name' => $faker->sentence,
                    'story_outline' => $faker->paragraph,
                    'status_ban' => 0,
                    'status_public' => 1,
                    'status_comment' => 1,
                    'unlock_coin' => 0,
                    'unlock_diamond' => 0,
                    'count_visitor' => 0,
                    'count_like' => 0
                ]);
            }

            // Set coin and diamond
            SubStory::create([
                'story_id' => $story->id,
                'story_name' => $faker->sentence,
                'story_outline' => $faker->paragraph,
                'status_ban' => 0,
                'status_public' => 1,
                'status_comment' => 1,
                'unlock_coin' => 200,
                'unlock_diamond' => 2,
                'count_visitor' => 0,
                'count_like' => 0
            ]);

        }
    }
}
