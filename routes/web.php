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

Route::get('influencerssearch',array('as'=>'influencers.search','uses'=>'SearchController@searchInfluencers'));

Route::get('/home', 'HomeController@index')->name('home');

