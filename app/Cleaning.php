<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cleaning extends Model
{
    protected $fillable = [
    	'type',
    	'code',
    	'total_hours',
    	'price_per_hour',
    	'total_price',
    	'description'
    ];

    public function prices() {
    	return $this->hasMany(CleaningIdentities::class);
    }
}
