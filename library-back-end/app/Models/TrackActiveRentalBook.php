<?php

// app/Models/TrackActiveRentalBook.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackActiveRentalBook extends Model
{
    use HasFactory;

    protected $fillable = ['rental_id', 'book_id', 'start_date', 'due_date', 'return_date', 'status'];

    public function customer()
{
    return $this->belongsTo(Customer::class);
}
}

