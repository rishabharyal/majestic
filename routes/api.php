<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::namespace('Api')->group(static function () {
	Route::get('cleaning-types', 'CleaningTypeController@index');
	Route::get('cleanings', 'CleaningController@index');
	Route::get('extra-identities', 'OrderWizardController@getExtraCleaningIdentities');
	Route::get('extra-services', 'OrderWizardController@getExtraCleaningTypes');
	Route::get('additional-services', 'OrderWizardController@getAdditionalServices');
});
