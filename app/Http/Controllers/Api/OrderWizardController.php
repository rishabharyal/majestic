<?php

namespace App\Http\Controllers\Api;

use App\Cleaning;
use App\Http\Controllers\Controller;
use App\Identity;
use App\CleaningType;
use App\CleaningIdentities;

class OrderWizardController extends Controller
{
	public function getExtraCleaningIdentities()
	{
		return response()->json([
			'success' => true,
			'data' => Identity::where('is_extra', 1)->get(['id', 'title'])->toArray()
		]);
	}

	public function getExtraCleaningTypes(CleaningType $cleaningType)
	{
		$cleaningType = $cleaningType->where('step_number', 5)->get();

		if (!count($cleaningType)) {
			return response()->json([
				'success' => false,
				'message' => 'Cleaning type not found!'
			]);
		}


		$cleanings = $cleaningType->map(function (CleaningType $cleaningItem) {
			$cleaning = Cleaning::where('type_id', $cleaningItem->id)->first();
			if (!$cleaning) {
				return [
					'id' => $cleaningItem->id,
					'title' => $cleaningItem->title,
					'data' => null,
				];
			}

			$cleaningIdentities = CleaningIdentities::where('cleaning_id', $cleaning->id)->pluck('identity_id')->toArray();

			$identities = Identity::whereIn('id', $cleaningIdentities)->get([
				'id', 'title', 'field_type'
			])->toArray();

			return [
				'id' => $cleaningItem->id,
				'title' => $cleaningItem->title,
				'data' => $identities
			];
		});

		return response()->json([
			'success' => true,
			'data' => $cleanings
		]);
	}

	public function getAdditionalServices(CleaningType $cleaningType)
	{

		$cleaningType = $cleaningType->where('step_number', 6)->get();

		if (!count($cleaningType)) {
			return response()->json([
				'success' => false,
				'message' => 'Cleaning type not found!'
			]);
		}


		$cleanings = $cleaningType->map(function (CleaningType $cleaningItem) {
			$cleaning = Cleaning::where('type_id', $cleaningItem->id)->first();
			if (!$cleaning) {
				return [
					'id' => $cleaningItem->id,
					'title' => $cleaningItem->title,
					'data' => null,
				];
			}

			$cleaningIdentities = CleaningIdentities::where('cleaning_id', $cleaning->id)->pluck('identity_id')->toArray();

			$identities = Identity::whereIn('id', $cleaningIdentities)->get([
				'id', 'title', 'field_type'
			])->toArray();

			return [
				'id' => $cleaningItem->id,
				'title' => $cleaningItem->title,
				'data' => $identities
			];
		});

		return response()->json([
			'success' => true,
			'data' => $cleanings
		]);
	}
}
