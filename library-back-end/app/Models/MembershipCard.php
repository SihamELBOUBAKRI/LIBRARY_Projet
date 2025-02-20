<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipCard extends Model
{
    // Relationships

    /**
     * A membership card belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

