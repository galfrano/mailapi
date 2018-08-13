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
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

/*
creating new templates is protected by password, login is required for token to exist
curl -X POST localhost/api/templates -H "Authorization: Bearer BmnUTsyHNX3IpCoxJAZGG7pcehhl3qCipIYMaUTpCwI01I5iJC7LJqx4P4Gz" \
-H "Accept: application/json" -H "Content-type: application/json" -d "{\"title\":\"Product name\", \"body\": \"New template\"}"
*/
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('templates', 'TemplateController@index');
    Route::get('templates/{template}', 'TemplateController@show');
    Route::post('templates', 'TemplateController@store');
    Route::put('templates/{template}', 'TemplateController@update');
    Route::delete('templates/{template}', 'TemplateController@delete');
});

Route::post('send-product-mail', 'ProductMailController@send');

