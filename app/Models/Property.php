<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Property extends Model
{
    use HasFactory;

    /**
     * Get the property that owns the property type.
     */
    public function propertTypes(): BelongsTo
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function agent(): BelongsTo
    {
        return $this->belongsTo(Agent::class);
    }
}
