<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngrediantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingrediants')->insert([
            'product_id' => 1,
            'name' => 'Beef',
            'quantity' => 20000,
            'breakPoint' => 10000,
            'created_at' => '2022-02-17 09:11:46',
            'updated_at' => '2022-02-17 09:11:46',
        ]);
        DB::table('ingrediants')->insert([
            'product_id' => 1,
            'name' => 'Cheese',
            'quantity' => 5000,
            'breakPoint' => 2500,
            'created_at' => '2022-02-17 09:11:46',
            'updated_at' => '2022-02-17 09:11:46',
        ]);
        DB::table('ingrediants')->insert([
            'product_id' => 1,
            'name' => 'Onion',
            'quantity' => 1000,
            'breakPoint' => 500,
            'created_at' => '2022-02-17 09:11:46',
            'updated_at' => '2022-02-17 09:11:46',
        ]);
    }
}
