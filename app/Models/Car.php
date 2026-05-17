<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = [
        'reg_number',
        'brand',
        'model',
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
    public function photos(): HasMany
    {
        return $this->hasMany(CarPhoto::class);
    }
}
