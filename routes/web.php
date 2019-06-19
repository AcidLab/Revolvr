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
    //return view('welcome');
    return Redirect::to(route('home'));
});

Route::resource('advertisers','AdvertisersController');
Route::get('deleteadvertiser/{id}',array('as'=>'advertiser.delete','uses'=>'AdvertisersController@deleteAdvertiser'));
Route::get('bannadvertiser/{id}',array('as'=>'advertiser.bann','uses'=>'AdvertisersController@bannAdvertiser'));
Route::get('acceptadvertiser/{id}',array('as'=>'advertiser.accept','uses'=>'AdvertisersController@acceptAdvertiser'));
Route::get('recoveradvertiser/{id}',array('as'=>'advertiser.recover','uses'=>'AdvertisersController@recoverAdvertiser'));
//---------------
Route::resource('influencers','InfluencersController');
Route::get('deleteinfluencer/{id}',array('as'=>'influencer.delete','uses'=>'InfluencersController@deleteInfluencer'));
Route::get('banninfluencer/{id}',array('as'=>'influencer.bann','uses'=>'InfluencersController@bannInfluencer'));
Route::get('acceptinfluencer/{id}',array('as'=>'influencer.accept','uses'=>'InfluencersController@acceptInfluencer'));
Route::get('recoverinfluencer/{id}',array('as'=>'influencer.recover','uses'=>'InfluencersController@recoverInfluencer'));

Auth::routes();
Route::get('logout',array('as'=>'logout','uses'=>'Auth\LoginController@logout'));

Route::get('/instagram', 'InstagramController@redirectToInstagramProvider');
 
Route::get('/instagram/callback', 'InstagramController@handleProviderInstagramCallback');
Route::get('/search', 'AppController@search');
Route::get('/index', 'AppController@index');

//Settings Routes
Route::resource('medias','MediasController');
Route::get('deletemedia{id}',array('as'=>'media.delete','uses'=>'MediasController@deleteMedia'));

Route::resource('skills','SkillsController');
Route::get('deleteskill{id}',array('as'=>'skill.delete','uses'=>'SkillsController@deleteSkill'));

Route::resource('tags','TagsController');
Route::get('deletetag{id}',array('as'=>'tag.delete','uses'=>'TagsController@deleteTag'));

Route::resource('animals','AnimalsController');
Route::get('deleteanimal{id}',array('as'=>'animal.delete','uses'=>'AnimalsController@deleteAnimal'));

Route::resource('foods','FoodsController');
Route::get('deletefood{id}',array('as'=>'food.delete','uses'=>'FoodsController@deleteFood'));

Route::resource('brands','BrandsController');
Route::get('deletebrand{id}',array('as'=>'brand.delete','uses'=>'BrandsController@deleteBrand'));

Route::resource('haircolors','HairColorsController');
Route::get('deletehaircolor{id}',array('as'=>'haircolor.delete','uses'=>'HairColorsController@deleteHairColor'));

Route::resource('hairstyles','HairStylesController');
Route::get('deleteeyecolor{id}',array('as'=>'eyecolor.delete','uses'=>'EyeColorsController@deleteEyeColor'));


Route::resource('eyecolors','EyeColorsController');
Route::get('deletehairstyle{id}',array('as'=>'hairstyle.delete','uses'=>'HairStylesController@deleteHairStyle'));

Route::resource('carnations','CarnationsController');
Route::get('deletecarnation{id}',array('as'=>'carnation.delete','uses'=>'CarnationsController@deleteCarnation'));

//---------------

Route::get('/home', 'HomeController@index')->name('home');

