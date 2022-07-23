<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'name', 'long_description', 'house_image','publication_status',
    ];
}
