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
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function() {
    Route::get('/dashboard', function() {
      return view('admin.pages.home.index');
    })->name('dashboard');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('cinemas', 'CinemaController');
    Route::resource('films', 'FilmController');
    //Route::resource('tickets', 'TicketController');
    // Route::get('/tickets/film/{id}', 'TicketController@getFilm');
    Route::resource('schedules', 'ScheduleController');
    Route::resource('bookings', 'BookingController');
});

Route::get('/home', 'HomeController@index')->name('home');
