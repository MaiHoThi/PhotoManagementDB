<?php

use App\Category;
use App\Photo;
use Illuminate\Support\Facades\Route;

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
// Category
Route::get('/admin/category','Admin\CategoryController@index');

// Photo
Route::get('/admin/index','Admin\PhotoController@index');
Route::get('photos/create','Admin\PhotoController@create');
Route::post('/photos/insert','Admin\PhotoController@store');
Route::get('edit/{id}','Admin\PhotoController@update');
Route::get('photos/{id}/update','Admin\PhotoController@edit');
Route::delete('photo/{id}','Admin\PhotoController@destroy');