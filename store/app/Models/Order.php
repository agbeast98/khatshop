<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'order_date',
        'total_price',
        'status',
        'state',
        'city',
        'full_address',
        'postal_code',
        'products',
        'discount_price',
        'shipping_method',
        'shipping_cost',
        'order_notes',
    ];

    protected $casts = [
        'products' => 'array',
        'order_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
