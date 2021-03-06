<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    //$order->products
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
