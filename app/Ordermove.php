<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordermove extends Model
{
    protected $fillable = [
        'product_name', 'product_price', 'product_quantity','customer_id','order_id',
    ];
}
