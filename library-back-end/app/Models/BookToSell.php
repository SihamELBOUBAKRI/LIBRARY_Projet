<?php

// app/Models/BookToSell.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookToSell extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'stock_quantity', 'author_id', 'category_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_book')
                    ->withTimestamps();
    }
    public function wishListItems()
    {
        return $this->hasMany(WishListItem::class);
    }


}
