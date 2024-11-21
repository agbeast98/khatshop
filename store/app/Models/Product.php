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
        'categories',
        'brand',
        'weight',
        'height',
        'width',
        'length',
        'tags',
        'description',
        'short_description',
        'price',
        'discount_price',
        'discount_expiry',
    ];

    protected $casts = [
        'categories' => 'array',
        'tags' => 'array',
        'discount_expiry' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
