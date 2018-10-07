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

Route::group(['as' => 'user.', 'namespace' => 'Home'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::resource('/films', 'FilmController');
    Route::get('/auth/profile', 'ProfileController@show')->name('profile');
    Route::get('/booking/step-1', 'BookingController@show')->name('booking');
    Route::get('/booking/step-2', 'BookingController@confirm')->name('confirm');
    // Route::resource('films', 'FilmController');
});
Route::get('/auth/profile', function () {
    return view('public.pages.profile');
})->name('auth.profile');

Auth::routes();
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'adminLogin'], function() {
    Route::get('/dashboard', function() {
      return view('admin.pages.home.index');
    })->name('dashboard');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('cinemas', 'CinemaController');
    Route::resource('films', 'FilmController');
    //Route::resource('tickets', 'TicketController');
    Route::get('/cinemas/room/{id}', 'CinemaController@getRoom');
    Route::resource('schedules', 'ScheduleController');
    Route::resource('bookings', 'BookingController');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Auth'], function() {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');
