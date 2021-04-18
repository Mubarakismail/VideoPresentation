<?php


Auth::routes();


Route::namespace('\App\Http\Controllers\BackEnd')->prefix('admin')->middleware('admin')->
group(function (){

    Route::get('/home','Home@index')->name('admin.home');
    Route::resource('users','UsersController')->except(['show']);
    Route::resource('categories','CategoriesController')->except(['show']);
    Route::resource('skills','SkillsController')->except(['show']);
    Route::resource('tags','TagsController')->except(['show']);
    Route::resource('pages','PagesController')->except(['show']);
    Route::resource('videos','VideosController')->except(['show']);
    Route::resource('messages','MessagesController')->only(['index','destroy','edit']);
    Route::post('messages/replay/{id}','MessagesController@replay')->name('message.replay');

});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('contact-us', 'HomeController@message')->name('contact.store');
Route::get('page/{id}/{slug}', 'HomeController@page')->name('front.page');


Route::get('/','HomeController@welcome')->name('frontend.landing');
