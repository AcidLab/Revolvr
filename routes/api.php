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

    //Route::post('addproject', 'Api\ProjectController@addProject');

});

Route::post('login', 'Api\AuthController@login');
Route::post('register/annonceur', 'Api\AuthController@registerAnn');  
Route::post('register/influencer', 'Api\AuthController@registerInf');    
Route::post('addproject', 'Api\ProjectController@addProject');
Route::post('updateproject', 'Api\ProjectController@updateProject');
Route::post('deleteproject', 'Api\ProjectController@deleteProject');
Route::post('showProjectByUserId', 'Api\ProjectController@showProjectByUserId');

Route::post('setFilter','Api\ProjectController@setFilter'); 
Route::post('getBookmark','Api\ProjectController@getBookmark');
Route::post('cancelBookmark','Api\ProjectController@cancelBookmark'); 
Route::post('likeDislike','Api\ProjectController@likeDislike');


//webservice 

Route::get('getAnimals', 'Api\AnimalController@getAnimals');

Route::get('getBrands', 'Api\BrandController@getBrands');

Route::get('getCarnations', 'Api\CarnationController@getCarnations');

Route::get('getCities', 'Api\CityController@getCities');

Route::get('getCountries', 'Api\CountryController@getCountries');

Route::get('getEyeColors', 'Api\EyeColorController@getEyeColors');

Route::get('getFoods', 'Api\FoodController@getFoods');

Route::get('getHairStyles', 'Api\HairStyleController@getHairStyles');

Route::get('getHairColors', 'Api\HairColorController@getHairColors');

Route::get('getMedias', 'Api\MediaController@getMedias');

Route::get('getSkills', 'Api\SkillController@getSkills');

Route::get('getTags', 'Api\TagController@getTags');



