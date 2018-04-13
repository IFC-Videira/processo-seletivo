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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

################### rotas da necessidade especial #################

Route::resource('specialneeds', 'SpecialNeedController');

Route::get('specialneeds/{specialneed}/confirmDestroy', 'SpecialNeedController@confirmDestroy');
#################### ###################### #######################

###################     rotas do processo seletivo  #######################

Route::resource('selectiveprocesses', 'SelectiveProcessController');
Route::get('selectiveprocesses/{selectiveprocess}/confirmDestroy', 'SelectiveProcessController@confirmDestroy');

#################### ###################### #######################
###################     rotas da inscrição  #######################

Route::get('/subscriptions/{subscription}/subscribe', 'SubscriptionController@subscribe');
Route::post('/subscriptions/{subscription}/subscribe_store', 'SubscriptionController@subscribeStore');
Route::resource('subscriptions', 'SubscriptionController');
Route::get('subscriptions/{subscription}/confirmDestroy', 'SubscriptionController@confirmDestroy');

#################### ###################### #######################
###################     rotas do profile  #######################

Route::resource('profiles', 'ProfileController');
Route::get('profiles/{profile}/confirmDestroy', 'ProfileController@confirmDestroy');

#################### ###################### #######################

###################     rotas da cotas  #######################

Route::resource('quotas', 'QuotaController');
Route::get('quotas/{quota}/confirmDestroy', 'QuotaController@confirmDestroy');


###################     rotas de insenção  #######################

Route::resource('exemptions', 'ExemptionController');
Route::get('exemptions/{exemption}/confirmDestroy', 'ExemptionController@confirmDestroy');

###################     rotas de curso  #######################

Route::resource('courses', 'CourseController');
Route::get('courses/{course}/confirmDestroy', 'CourseController@confirmDestroy');

###################     rotas do endereco  #######################

Route::resource('addresses', 'AddressController');
Route::get('addresses/{address}/confirmDestroy', 'AddressController@confirmDestroy');


###################     rotas do avatar #######################

Route::resource('avatars', 'UserController');

###################     rotas do usuario #######################

Route::resource('users', 'UserController');