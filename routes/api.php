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
//Login
Route::post('login', 'Api\AuthController@login');
Route::post('announcer/register', 'Api\AuthController@registerAnn');  
Route::post('influencer/register', 'Api\AuthController@registerInf');   

//Project
Route::post('project/create', 'Api\ProjectController@create');
Route::post('project/update', 'Api\ProjectController@updateProject');
Route::post('project/delete', 'Api\ProjectController@deleteProject');
Route::post('projects', 'Api\ProjectController@index');
Route::post('project/influencers',array('as'=>'influencers.search','uses'=>'SearchController@searchInfluencers'));
Route::post('project/bookmark','Api\ProjectController@bookmark');

//Influencer
Route::post('influencer/undo','Api\ProjectController@cancelBookmark'); 
Route::post('influencer/like','Api\ProjectController@likeDislike');
Route::post('influencer/dislike','Api\ProjectController@likeDislike');
//Route::post('influencer/bookmark/make','Api\ProjectController@likeDislike');

//Config 
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
Route::get('config', 'Api\ConfigController@getAll');




