<?php

// app/Models/Customer.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'address'];
    

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
    
    public function wishList()
    {
        return $this->hasOne(WishList::class);
    }
    


    public function member()
    {
        return $this->hasOne(Member::class);
    }
    

}

