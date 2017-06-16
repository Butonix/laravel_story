<?php

use App\RegisterWriter;
use App\Member;
use Illuminate\Database\Seeder;

class RegisterWriterSeeder extends Seeder
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
            $full_name = $faker->name;
            RegisterWriter::create([
                'member_id' => $member->id,
                'full_name' => $full_name,
                'id_card' => rand(0000000000000, 9999999999999),
                'address' => $faker->address,
                'tel' => $faker->phoneNumber,
                'bank_name' => 'KASIKORNBANK',
                'bank_sub_branch' => '-',
                'bank_account_number' => $faker->bankAccountNumber,
                'bank_account_name' => $full_name,
                'status_confirm' => 1,
                'status_reject' => 0
            ]);
        }
    }
}
