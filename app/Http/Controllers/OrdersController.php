<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Ingrediant;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductSpecification;
use App\Mail\IngredientsShortage;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Accepts the order details from the request payload and presists it in the database
        foreach($request->json('products') as $product) {
            $order = Order::create($product);
        }
        // Update the stock of the ingredients.
        $ingrediants = Ingrediant::where('product_id',$order->products->id)->get();
        foreach($ingrediants as $ingrediant) {
            $ingrediantName = $ingrediant->name; // Get the name of the ingrediant (beef, cheese, or onion)
            // Concat name of ingrediant with the order specification and multiplies it by the quantity
            $ingrediantTotal = $order->products->specification->$ingrediantName * $order->quantity;
            // Subtraction of the initial value of the quantity and the given quantity to get the total price
            $updatedQty = $ingrediant->quantity - $ingrediantTotal;
            $updateIngrediants = Ingrediant::where('name',$ingrediant->name)->update(array('quantity' => $ingrediant->quantity - $ingrediantTotal));
            if ($updatedQty < $ingrediant->breakPoint ) {
                $updateBreakPoint = Ingrediant::where('name',$ingrediant->name)->update(array('status' => true));
                // Ensure the email will be sent only once per ingrediant once below 50% is reached
                if($ingrediant->status = true && $ingrediant->isMailed == false) {
                    $updateIsMailed = Ingrediant::where('name',$ingrediant->name)->update(array('isMailed' => true));
                    Mail::to('fares.shawa@gmail.com')->send(new IngredientsShortage($ingrediant));
                }
            }
        }
    }
}
