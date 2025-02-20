<?php

// app/Models/BookToSell.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookToSell extends Model
{
    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function wishlists()
    {
        return $this->belongsToMany(Wishlist::class, 'wishlist_book', 'book_id', 'wishlist_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_book', 'book_id', 'cart_id')->withPivot('quantity');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_book', 'book_id', 'order_id')->withPivot('quantity');
    }
}