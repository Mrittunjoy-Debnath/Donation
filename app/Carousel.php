<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'name', 'carousel_image','publication_status',
    ];
}
