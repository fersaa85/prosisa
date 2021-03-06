<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['prefix' => 'admin',
    'middleware'=> 'auth'], function () {

    Route::controller('shop', 'AdminShopController');
    Route::controller('slider', 'AdminSliderController');
    Route::controller('contend', 'AdminContendController');

});


Route::controller('tienda', 'ShopController');
Route::controller('/', 'HomeController');