<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

    public function url(): string
    {
        return '/' . config('catalog.folder') . '/' . $this->category->id . '/' . $this->id;
    }

    public function cart(): string
    {
        return '/' . config('catalog.cart') . '/' . $this->id;
    }
}
