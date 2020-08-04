<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\CleaningType;

class CleaningTypeController extends Controller
{
	public function index()
	{
		$types  = CleaningType::where('step_number', 1)->get(['id', 'title']);

		return response()->json([
			'success' => true,
			'data' => [
				'cleaning-types' => $types,
			]
		]);
	}
}
