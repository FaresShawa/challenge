<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Fares',
            'email' => 'fares.shawa@hotmail.com',
            'password' => Hash::make('123456789'),
            'created_at' => '2022-02-17 09:11:46',
            'updated_at' => '2022-02-17 09:11:46',
        ]);
    }
}
