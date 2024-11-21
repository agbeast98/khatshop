<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'parent_id'];

    // رابطه با دسته‌بندی والد
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // رابطه با زیر‌دسته‌ها
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // رابطه با محصولات
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
