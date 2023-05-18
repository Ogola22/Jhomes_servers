<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Agent extends Model
{
     /**
     * Get the post that owns the comment.
     */
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }
    public function propertie(): HasMany
    {
        return $this->hasMany(Property::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

}
