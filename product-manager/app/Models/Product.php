<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'stock', 'category'];
    
    protected $attributes = [
        'description' => '',
        'price' => 0.00,
        'stock' => 0,
        'category' => '',
    ];
}
