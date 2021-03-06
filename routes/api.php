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
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::namespace('Api')->group(static function () {
	Route::get('cleaning-types', 'CleaningTypeController@index');
	Route::get('cleaning-types/description', 'CleaningTypeController@getDescriptions');
	Route::get('cleanings', 'CleaningController@index');
	Route::get('extra-identities', 'OrderWizardController@getExtraCleaningIdentities');
	Route::get('extra-cleaning-types/{step_number}', 'OrderWizardController@getExtraCleaningTypes');
	Route::post('booking', 'BookingController@store');
});
