<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreviousWork extends Model
{
    protected $fillable = [
        'name', 'long_description', 'work_image','publication_status',
    ];
}
