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

// Auth Routes...
Route::group(['middleware' => ['web', 'admin.guest']], function () {
    Route::get('/login', 'Auth\AdminLoginController@showAdminLoginForm')->name('login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('attempt-login');
});

Route::group(['middleware' => 'admin'], function () {
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('logout');

    Route::get('/', 'AdminController@dashboard')->name('dashboard');

    Route::group([], function () {
        Route::resource('users', AdminUserController::class, [
            'except' => ['create', 'store', 'destroy'],
        ]);
    });
});
