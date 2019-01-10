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

Route::get('/', function () {
    $tags = array_map(function($val){
        return strtolower($val);
    },json_decode(file_get_contents(asset('storage/symbols.json'))));

    return view('index',["data"=>json_encode([
        "market" => [],
        "chart" => [],
        "errors" => [],       
        "code" => [],
        "tags" => $tags
    ])]);
});
Route::post('/', [
    'middleware' => 'validate.form',
    'uses' => 'MarketHistory@getMarketHistory'
    ]);