<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_specifications')->insert([
            'Beef' => 150,
            'Cheese' => 30,
            'Onion' => 20,
            'created_at' => '2022-02-17 09:11:46',
            'updated_at' => '2022-02-17 09:11:46',
        ]);
    }
}