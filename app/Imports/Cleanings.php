<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

use App\Identity;
use App\Cleaning;
use App\CleaningIdentities;

HeadingRowFormatter::default('none');

class Cleanings implements ToCollection, WithHeadingRow
{
	private $type;

	public function __construct($type = 'Regular') {
		$this->type = $type;
	}

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $cleaning) {
        	$cleaning = $cleaning->toArray();
        	$cleaningData['code'] = $cleaning['Code'];
        	$cleaningData['total_hours'] = $cleaning['Total Hours'];
        	$cleaningData['price_per_hour'] = $cleaning['Price Per Hour'];
        	$cleaningData['total_price'] = $cleaning['Total Price'];
        	unset($cleaning['Code']);
        	unset($cleaning['Total Hours']);
        	unset($cleaning['Price Per Hour']);
        	unset($cleaning['Total Price']);

        	$cleaningId = $this->createCleaning($cleaningData);
        	$searchTerm = '';

        	dump('Importing ' . $cleaningData['code']);
        	foreach($cleaning as $identity => $quantity) {
        		$identityId = $this->findOrCreateIdentity($identity);
        		$this->createCleaningIdentity($cleaningId, $identityId, $quantity);
        	}

        	$this->createIndex($cleaningId);
        }
    }

    private function createIndex($cleaningId) {
    	$identities = Identity::all();
    	$index = '';
    	foreach ($identities as $key => $identity) {
    		$cleaningIdentity = CleaningIdentities::where('cleaning_id', $cleaningId)->where('identity_id', $identity->id)->first();
    		if (!$cleaningIdentity) {
    			continue;
    		}
    		$qty = $cleaningIdentity->quantity;
    		if ($key > 0) {
    			$index .= ',';
    		}
    		$index .= $qty;
    	}
    	if (!$index) {
    		return;
    	}
    	$cleaning = Cleaning::find($cleaningId);
    	$cleaning->search_index = $index;
    	$cleaning->save();
    }

    private function createCleaning($params) {
    	$cleaning = Cleaning::where('type', $this->type)->where('code', $params['code'])->first();
    	if ($cleaning) {
    		return $cleaning->id;
    	}

    	$params['type'] = $this->type;
    	return (Cleaning::create($params))->id;

    }

    private function findOrCreateIdentity($title) {
    	$identity = Identity::where('title', $title)->first();

    	if ($identity) {
    		return $identity->id;
    	}

    	return (Identity::create([
    		'title' => $title
    	]))->id;
    }

    private function createCleaningIdentity($cleaningId, $identityId, $quantity) {
    	$cleaningIdentity = CleaningIdentities::where('cleaning_id', $cleaningId)->where('identity_id', $identityId)->first();
    	if ($cleaningIdentity) {
    		$cleaningIdentity->quantity = $quantity;
    		$cleaningIdentity->save();
            return;
    	}

    	CleaningIdentities::create([
			'cleaning_id' => $cleaningId,
			'identity_id' => $identityId,
			'quantity' => $quantity
		]);
    }
}
