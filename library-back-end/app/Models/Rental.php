<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookToRent()
    {
        return $this->belongsTo(BookToRent::class);
    }
}
