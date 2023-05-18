<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PropertyType extends Model
{
    /**
     * Get the properties for the property type.
     */
    public function propertie(): HasMany
    {
        return $this->hasMany(Property::class);
    }
}
