<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'cin', 'gender', 'birthday', 'membership_start_date', 'membership_end_date'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

