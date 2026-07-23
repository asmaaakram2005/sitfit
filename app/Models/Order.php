<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Address;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'total_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}