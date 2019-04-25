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
Route::post('projects', 'Api\ProjectController@showProjectByUserId');

Route::post('setFilter','Api\ProjectController@setFilter'); 
Route::post('getBookmark','Api\ProjectController@getBookmark');
Route::post('cancelBookmark','Api\ProjectController@cancelBookmark'); 
Route::post('likeDislike','Api\ProjectController@likeDislike');


//webservice 

Route::post('animals', 'Api\AnimalController@getAnimals');

Route::post('brands', 'Api\BrandController@getBrands');

Route::post('carnations', 'Api\CarnationController@getCarnations');

Route::post('cities', 'Api\CityController@getCities');

Route::post('countries', 'Api\CountryController@getCountries');

Route::post('eye-color', 'Api\EyeColorController@getEyeColors');

Route::post('foods', 'Api\FoodController@getFoods');

Route::post('hair-color', 'Api\HairColorController@getHairColors');
Route::post('hair-style', 'Api\HairStyleController@getHairStyles');


Route::post('medias', 'Api\MediaController@getMedias');

Route::post('skills', 'Api\SkillController@getSkills');

Route::post('tags', 'Api\TagController@getTags');



