<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'likeable_id',
        'likeable_type',
    ];

    /**
     * Get the parent likeable model (blog or project).
     */
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the like.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}