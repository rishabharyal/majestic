<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Identity;
use App\CleaningType;
use App\CleaningIdentities;

class OrderWizardController extends Controller
{
    public function getExtraCleaningIdentities() {
    	return response()->json([
    		'success' => true,
    		'data' => Identity::where('is_extra', 1)->get(['id', 'title'])->toArray()
    	]);
    }

    public function getAdditionalServices(CleaningType $cleaning) {

    	$cleaning = $cleaning->where('is_additional_service', 1)->get();

    	if (!count($cleaning)) {
    		return response()->json([
    			'success' => false,
    			'message' => 'Cleaning type not found!'
    		]);
    	}

    	$cleaning = $cleaning->map(function(CleaningType $cleaningItem) {
	    	$cleaningIdentities = CleaningIdentities::where('cleaning_id', $cleaningItem->id)->pluck('identity_id')->toArray();

	    	$identities = Identity::whereIn('id', $cleaningIdentities)->get([
	    		'id', 'title'
	    	])->toArray();

    		return [
    			'title' => $cleaningItem->title,
    			'data' => $identities
    		];
    	});

    	return response()->json([
    		'success' => true,
    		'data' => $cleaning
    	]);
    }
}
