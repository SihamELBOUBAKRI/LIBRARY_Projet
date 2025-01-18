<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListItem extends Model
{
    use HasFactory;
        public function wishList()
    {
        return $this->belongsTo(WishList::class);
    }

        public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
