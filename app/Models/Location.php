<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function car()
    {
        return $this->belongsTo('App\Models\Car','car_id');
    }
}
