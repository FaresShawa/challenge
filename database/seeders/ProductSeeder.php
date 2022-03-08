<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Burger',
            'specification_id' => 1,
            'created_at' => '2022-02-17 09:11:46',
            'updated_at' => '2022-02-17 09:11:46',
        ]);
    }
}
