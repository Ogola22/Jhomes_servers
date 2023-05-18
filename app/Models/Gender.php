<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    use HasFactory;
  //getting the agents for the gender
  
    public function agents(): HasMany
    {
        return $this->hasMany(Agent::class);


    }


}



