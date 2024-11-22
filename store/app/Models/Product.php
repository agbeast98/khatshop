<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'english_name',
        'brand',
        'weight',
        'height',
        'width',
        'length',
        'tags',
        'short_description',
        'description',
        'price',
        'discount_price',
        'discount_expiry',
        'categories',
        'stock',
    ];

    protected $casts = [
        'categories' => 'array',
        'tags' => 'array',
        'discount_expiry' => 'date',
    ];
}
