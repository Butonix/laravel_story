<?php

use App\Administrator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::create([
            'username' => 'admin',
            'password' => Hash::make('1234')
        ]);
    }
}
