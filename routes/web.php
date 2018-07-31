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

/*------------------------------------------ AUTH ROUTE SECTION -------------------------------------------------*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

/*-------------------------------------------END OF ROUTE SECTION---------------------------------------------------*/

Route::get('/home', 'HomeController@index')->name('home');


/*----------------------------------------------Leads-----------------------------------------------------------*/

Route::group(['prefix'=>''],function(){
    Route::get('/leads/export','LeadController@export');
    Route::get('/leads/import','LeadController@import');
    Route::post('/leads/import/store','LeadController@storefile');
    Route::resource('/leads','LeadController');
  
});

/*------------------------------------------End of Leads-------------------------------------------------*/




/*----------------------------------------------Entrust Routes------------------------------------------------------*/


Route::group(['prefix'=>''],function(){
    Route::resource('/permission','PermissionController');
});

Route::group(['prefix'=>''],function(){
    Route::resource('/role','RoleController');
});

/*------------------------------------------End of Entrust Routes-------------------------------------------------*/

 
/*----------------------------------------------User Routes-----------------------------------------------------------*/

Route::group(['prefix'=>''],function(){
    Route::resource('/user','UserController');
});

/*------------------------------------------End of User Routes-------------------------------------------------*/

 
/*----------------------------------------------User Profile-----------------------------------------------------------*/

Route::group(['prefix'=>''],function(){
    Route::resource('/profile','ProfileController');
});

/*------------------------------------------End of User Profile-------------------------------------------------*/