<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'offer', 'sale', 'category', 'image', 'status',
    ];
}
