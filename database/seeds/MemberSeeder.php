<?php

use App\Member;
use App\MemberMoney;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i = 0; $i <= 4; $i++) {
            $username = $faker->userName;
            $member = Member::create([
                'username' => $username,
                'author' => $username,
                'email' => $faker->email,
                'password' => Hash::make('1234'),
                'text_password' => encrypt('1234'),
                'status_ban' => 0,
            ]);
            MemberMoney::create([
                'member_id' => $member->id,
                'cash' => 0,
                'diamond' => 0
            ]);
        }
    }
}
