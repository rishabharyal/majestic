<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CleaningType;
use App\Identity;
use App\CleaningIdentities;
use App\Cleaning;

class CleaningController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request, CleaningType $cleaningType)
	{
		$type = $request->get('type_id');
		if (!$type) {
			return response()->json([
				'success' => false,
				'message' => 'No cleaning type provided.'
			]);
		}

		$cleaningType = $cleaningType->find($type);

		if (!$cleaningType) {
			return response()->json([
				'success' => false,
				'message' => 'Cleaning type not found!'
			]);
		}

		$cleaning = Cleaning::where('type_id', $cleaningType->id)->first();


		$cleaningIdentities = CleaningIdentities::where('cleaning_id', $cleaning->id)->pluck('identity_id')->toArray();

		$identities = Identity::whereIn('id', $cleaningIdentities)->get([
			'id', 'title', 'field_type'
		])->toArray();

		return response()->json([
			'success' => true,
			'data' => [
				'title' => $cleaningType->title,
				'field_type' => $cleaningType->field_type,
				'identities' => $identities
			]
		]);
	}
}
