<?php

// app/Models/Author.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'biography', 'date_of_birth', 'date_of_death'];

    public function booksToSell()
    {
        return $this->hasMany(BookToSell::class);
    }

    public function booksToRent()
    {
        return $this->hasMany(BookToRent::class);
    }
}
