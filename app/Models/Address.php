<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'label',
        'country',
        'city',
        'street',
        'building_number',
        'floor',
        'apartment_number',
        'postal_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}