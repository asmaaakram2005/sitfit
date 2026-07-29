<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'community',
        'track',
        'email',
        'first_letter',
    ];

    /**
     * Boot method لتحديد القيمة تلقائياً قبل الحفظ دائماً
     */
    protected static function booted(): void
    {
        static::saving(function ($team) {
            if (!empty($team->name)) {
                $team->first_letter = mb_substr(trim($team->name), 0, 1, 'UTF-8');
            }
        });
    }

    /**
     * Accessor: لو الحرف فاضي في الداتا بيز يرجع الحرف الأول أوتوماتيك
     */
    public function getFirstLetterAttribute()
    {
        return $this->attributes['first_letter'] 
            ?? (isset($this->attributes['name']) ? mb_substr(trim($this->attributes['name']), 0, 1, 'UTF-8') : '');
    }
}