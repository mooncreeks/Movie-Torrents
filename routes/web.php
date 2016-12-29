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
    return view('home');
})->name('home');

Auth::routes();

//Admin routes
Route::group(
    ['prefix'=>'admin','middleware'=>'auth'],function(){
    //Allows admin to add genre, see all genres, edit or delete them
    Route::get('/genres','AdminPagesController@getGenres')->name('getGenres');

    //Allows admin to add new genre
    Route::post('/genres','AdminPagesController@postGenre')->name('postGenre');

    //Delete genre
    Route::get('/genre/{genre_id}/delete','AdminPagesController@deleteGenre')->name('deleteGenre');

    //Edit genre
    Route::post('/genre/{genre_id}/edit','AdminPagesController@postEditGenre')->name('postEditGenre');
}
);

