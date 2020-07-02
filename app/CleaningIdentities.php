<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CleaningIdentities extends Model
{
    protected $fillable = [
    	'cleaning_id',
    	'identity_id',
    	'quantity'
    ];
}
