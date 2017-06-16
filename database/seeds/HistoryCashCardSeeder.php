<?php

use App\Member;
use App\HistoryCashCard;
use App\MemberMoney;
use Illuminate\Database\Seeder;

class HistoryCashCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            $member = Member::find($i);
            HistoryCashCard::create([
                'member_id' => $member->id,
                'transaction' => rand(00000000, 99999999),
                'response_code' => 0,
                'response_desc' => 'Success',
                'cashcard_no' => rand(00000000000000, 99999999999999),
                'amount' => 5000,
                'status' => 'success'
            ]);
            MemberMoney::where('id', $member->id)->update([
                'cash' => 5400
            ]);
        }
    }
}
