<?php
use App\Http\Controllers\Admin\AdminController;

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

Route::group(['as'=>'admin.','prefix' => 'admin/', 'namespace'=>'Admin','middleware'=>['auth','admin']],function(){
    Route::get('dashboard','AdminController@index')->name('dashboard');
    Route::get('adduser','AdminController@adduser')->name('adduserShow');
    Route::post('adduser','AdminController@adduserStore')->name('adduser');
    Route::get('addformdata','AdminController@addForm')->name('addformdata');
    Route::get('smsdetails','AdminController@smsDetails')->name('smsdetails');
});

Route::group(['as'=>'staff.','prefix' => 'staff/', 'namespace'=>'Staff','middleware'=>['auth','staff']],function(){
    Route::get('dashboard','StaffController@index')->name('dashboard');
    

});

Route::group(['as'=>'entry.','prefix' => 'entry/', 'namespace'=>'Entry','middleware'=>['auth','entry']],function(){
    Route::get('dashboard','EntryController@index')->name('dashboard');
    Route::post('dashboard','EntryController@submitForm')->name('store');
    Route::get('getdivisionalclients/{id}','EntryController@getDivisionalClients');
    
    Route::get('getdistricts/{id}','EntryController@showDistrict')->name('showdistrict');
    Route::get('getupazillas/{id}','EntryController@showUpazilla')->name('showupazilla');
    Route::get('getpourosavas/{id}','EntryController@showPourosava')->name('showUpourosava');
    Route::get('getcitycorps/{id}','EntryController@showCitycorp')->name('showCitycorp');
    Route::get('addsms','EntryController@addsms')->name('addsms');
    Route::get('addemail','EntryController@addemail')->name('addemail');
    Route::post('collectsmsrequest','EntryController@recieveSmsRequest');
    Route::get('apatoto','EntryController@apatoto');
    Route::get('apatotoo','EntryController@apatotoStore');
});

Route::get('/home', 'HomeController@index')->name('home');
