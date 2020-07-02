<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/services', 'HomeController@index');
Route::get('/services/{slug}', 'HomeController@show');
Route::get('/team', 'HomeController@showTeamPage');
Route::get('/blog', 'HomeController@index');
Route::get('/blog/{id}', 'HomeController@show');
Route::get('/contact-us', 'HomeController@showContactPage');
Route::get('/about', 'HomeController@showAboutPage');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(static function () {
    Route::resource('/', 'DashboardController');
    Route::get('user/{id}/suspend', 'UserController@suspend');
    Route::resource('users', 'UserController');
    Route::resource('postcode', 'PostcodeController');
    Route::resource('city', 'CityController');
    Route::delete('service/media/{id}', 'ServiceController@deleteMedia');
    Route::delete('portfolio/media/{id}', 'PortfolioController@deleteMedia');
    Route::delete('blog/media/{id}', 'BlogController@deleteMedia');
    Route::resource('setting', 'SettingController');
    Route::resource('service', 'ServiceController');
    Route::resource('identities', 'IdentityController');
    Route::resource('portfolio', 'PortfolioController');
    Route::resource('blog', 'BlogController');
});
