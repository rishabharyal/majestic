<?php

namespace App;

use Plank\Mediable\Mediable;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Mediable;

    public function postcodes()
    {
        return $this->belongsToMany(Postcode::class, 'services_postcode');
    }
}
