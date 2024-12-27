<?php

// app/Models/BookToRent.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookToRent extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'rental_price_per_day', 'available_quantity', 'author_id', 'category_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

