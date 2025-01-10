<?php

// app/Models/Category.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function booksToSell()
    {
        return $this->hasMany(BookToSell::class);
    }

    public function booksToRent()
    {
        return $this->hasMany(BookToRent::class);
    }
}
