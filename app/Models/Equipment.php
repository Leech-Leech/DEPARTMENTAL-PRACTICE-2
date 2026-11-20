<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    protected $fillable = [
        'equipment_name',
        'category',
        'unit_price',
        'description',
        'availability_status',
    ];

    // Each equipment belongs to one user.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}