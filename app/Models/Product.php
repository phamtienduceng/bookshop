<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'price', 'image', 'image1', 'image2', 'description', 'category_id'];
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'wishlists');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function wishlistedBy()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'book_id', 'user_id');
    }

    // Each product can be part of multiple order items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
