<?php

// app/Models/BookToRent.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookToRent extends Model
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

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function activeRentals()
    {
        return $this->hasMany(ActiveRental::class);
    }
}