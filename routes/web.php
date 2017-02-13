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

Route::resource('comments', 'CommentsController');
//Route::resource('/', 'CommentsController@store');



Route::resource('articles', 'ArticlesController');
 Route::get('/', 'ArticlesController@index');
 Route::get('/profile', 'StaticsController@profile');


Route::get('downloadExcel', 'ArticlesController@downloadExcel');

Route::post('importExcel', 'ArticlesController@importExcel');
 Route::get('/importExcel', function () {
    return view('articles.create_excel');
});

 //Route::post('/login', 'SessionsController@login');
  //Route::put('/password-reset/{id}', 'SessionsController@password_reset');
   //Route::delete('/remove-baned', 'SessionsController@remove_baned');

    //Route::resource('/articles', 'ArticlesController', ['only'=>['index']]);
    //Route::resource('/articles', 'ArticlesController', ['except'=>['index', 'show', 'destroy']]);

    //Route::group(['middleware' => 'auth'], function () {

    //Route::resource('articles', 'ArticlesController', ['create', 'store']);
   // 	 Route::get('/', function () {
    //return view('welcome'); 

  //});

//      Route::group(['namespace' => 'Admin'], function() {

//    Route::resource('articles', 'ArticlesController');

 //});






//});
