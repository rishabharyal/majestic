<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    public function postcodes(){
        return $this->belongsToMany(Postcode::class,'services_postcode');
    }
}
