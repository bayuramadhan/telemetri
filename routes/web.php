<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
Route::get('/reset', function () {
    return view('auth/passwords/reset');
});

Auth::routes();

Route::get('/home', 'PagesController@inverter');

Route::resource('posts', 'PostsController');

Route::resource('relays', 'RelaysController');

Route::get('products', 'ProductController@index');
Route::get('product_modreator', 'ProductController@product_modreator');

Route::get('inverter', 'PagesController@inverter');
Route::get('solar', 'PagesController@solar');
Route::get('battery', 'PagesController@battery');
Route::get('update_relay', 'PagesController@update_relay');
Route::get('read_posts', 'PagesController@read_posts');

Route::get('div_relay', 'PagesController@div_relay');
Route::get('div_switch', 'PagesController@div_switch');
Route::get('update_currentlimit', 'PagesController@update_currentlimit');
 

Route::get('arduino/{inverter_current}/{inverter_voltage}/{solar_current}/{solar_voltage}/{solar_intensity}/{battery_current}/{battery_voltage}/{inverter_power}/{solar_power}/{battery_power}/{battery_percentage}', ['uses' => 'PagesController@arduino_update']);
Route::get('arduino/relays','PagesController@arduino_relays');
Route::get('arduino/relays/off','PagesController@arduino_relays_off');



