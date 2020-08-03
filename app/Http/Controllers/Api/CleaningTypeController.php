<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\CleaningType;

class CleaningTypeController extends Controller
{
	public function index()
	{
		$types  = CleaningType::get(['id', 'title']);

		return response()->json([
			'success' => true,
			'data' => [
				'cleaning-types' => $types,
			]
		]);
	}
}
