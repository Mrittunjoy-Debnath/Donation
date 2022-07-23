<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdermoveShipping extends Model
{
    protected $fillable = [
        'name', 'email', 'phone','address',
    ];
}
