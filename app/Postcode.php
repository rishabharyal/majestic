<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    protected $table = 'postcodes';
    public function city(){
        return $this->belongsTo(City::class);
    }
}
