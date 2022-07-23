<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    protected $fillable = [
        'name', 'long_description', 'aboutus_image','publication_status',
    ];
}
