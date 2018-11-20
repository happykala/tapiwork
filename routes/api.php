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
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'],function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    /**
     * Url: /api/v1/cafes
     * Controller: API\CafesController@getCafes 
     * Method: get
     * Description: get all cafes in the application
     */
    Route::get('/cafes','API\CafesController@getCafes');

    /**
     * Url: /api/v1/cafe/{id} 
     * Controller: API\CafesController@getCafe 
     * Method: get
     * Description: get a cafe detail
     */
    Route::get('/cafe/{id}','API\CafesController@getCafe');

    /**
     * Url: /api/v1/cafes 
     * Controller: API\CafesController@postNewCafe 
     * Method: post
     * Description: add new cafe
     */
    Route::post('/cafes', 'API\CafesController@postNewCafe');

    /**
     * Url: /api/v1/brew_methods
     * Controller: API\BrewMethodsController@getBrewMethods
     * Method: get
     * Description: get all BrewMethod with the count of cafe
     */
    Route::get('/brew_methods','API\BrewMethodsController@getBrewMethods');

    /**
     * Url: /api/v1/cafes/{id}/like
     * Controller: API\CafesController@postLikeCafe
     * Method: post
     * Description: post cafe like data
     */
    Route::post('/cafes/{id}/like','API\CafesController@postLikeCafe');

    /**
     * Url: /api/v1/cafes/{id}/like
     * Controller: API\CafesController@deleteLikeCafe
     * Method: delete
     * Description: delete cafe like data
     */
    Route::delete('/cafes/{id}/like','API\CafesController@deleteLikeCafe');
});
