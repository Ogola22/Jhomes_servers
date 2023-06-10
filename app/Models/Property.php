<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Property extends Model
{
    use HasFactory;

    /**
     * Get the property that owns the property type.
     */

    protected $table = 'properties';
    protected $fillable = [];
    // public function user()
    //  {
    //     return $this->belongsTo(User::class);
    // }
}
