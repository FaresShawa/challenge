<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Order;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_order()
    {
        $response = $this->postJson('/api/orders/create', [
            "products" => [
                [
                    "product_id" => 1,
                    "quantity" => 2,
                    "user_id" => 1
                ],
            ]
        ]);
        $response->assertStatus(200);
    }

    public function test_ingrediants_are_updated()
    {
        $orders = Order::all();
        $quantity = $orders->sum('quantity');
        $beef = 150 * $quantity; 
        $cheese = 30 * $quantity;
        $onion = 20 * $quantity;
        $this->assertDatabaseHas('ingrediants',[
            'name' => 'Beef',
            'quantity' => 20000 - $beef,
            'name' => 'Cheese',
            'quantity' => 5000 - $cheese,
            'name' => 'Onion',
            'quantity' => 1000 - $onion,
        ]);
    }
}
