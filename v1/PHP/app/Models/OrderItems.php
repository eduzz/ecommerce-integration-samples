<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $guarded = ["id"];

    public function order()
    {
        return $this->belongsTo(Order::class, "order_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
}