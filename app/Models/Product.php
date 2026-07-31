<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\CartItem;
use App\Models\OrderItem;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image_1',
        'image_2',
        'image_3',
        'is_active',
        'material',
        'weight_capacity',
        'warranty',
        'compatibility',
        'frame_material',
        'upholstery',
        'recline_range',
        'long_description',
        'Smart_Features',
        'AI_Posture_Tracking',
        'Silent_Vibration_Alerts',
        'Companion_App',
        'Universal_Ergonomic_Fit_Features',
        'feature_1',
        'feature_2',
        'feature_3',
    ];

        public function getRouteKeyName()
    {
        return 'slug';
    }  

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}