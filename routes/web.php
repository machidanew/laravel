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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'ArticleController@index');
Route::get('create', 'ArticleController@create');
Route::post('create', 'ArticleController@store');
Route::get('edit/{id}', 'ArticleController@edit');
Route::post('edit', 'ArticleController@update');
Route::get('delete/{id}', 'ArticleController@show');
Route::post('delete', 'ArticleController@delete');
Route::get('view/{id}','ArticleController@view');
Route::post('store/{article}/comments','CommentsController@store');
Route::delete('/articles/{article}/comments/{comment}','CommentsController@destroy');
Route::get('/user/signin',['as' => 'user.signin',
           'uses' => 'UserController@getSignin']);
//ログインからのpost処理
Route::post('/user/signin',['as' => 'user.signin',
            'uses' => 'UserController@postSignin']);
Route::resource('users', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
