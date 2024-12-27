<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'total_price', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function trackBookPurchases()
    {
        return $this->hasMany(TrackBookPurchase::class);
    }

    public function trackActiveRentalBooks()
    {
        return $this->hasMany(TrackActiveRentalBook::class);
    }
}

