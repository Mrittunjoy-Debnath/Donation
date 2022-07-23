<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    protected $fillable = [
        'customer_id', 'customer_name', 'number','trnxid',
    ];
}
