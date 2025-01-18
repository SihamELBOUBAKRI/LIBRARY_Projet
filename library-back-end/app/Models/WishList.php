<?php

// app/Models/Wishlist.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'book_id'];

    
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

        public function items()
    {
        return $this->hasMany(WishListItem::class);
    }

}
