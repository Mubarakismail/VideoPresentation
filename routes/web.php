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


Route::namespace('\App\Http\Controllers\BackEnd')->prefix('admin')->group(function (){

    Route::get('/home','Home@index')->name('admin.home');
    Route::resource('users','UsersController')->except(['show']);
    Route::resource('categories','CategoriesController')->except(['show']);
    Route::resource('skills','SkillsController')->except(['show']);
    Route::resource('tags','TagsController')->except(['show']);
    Route::resource('pages','PagesController')->except(['show']);
    Route::resource('videos','VideosController')->except(['show']);
});
Route::get('/home', 'HomeController@index')->name('home');
