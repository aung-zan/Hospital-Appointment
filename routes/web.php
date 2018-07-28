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

// Route::get('/', function () {
//     return view('welcome');
// });


// admin site routes
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@loginForm')                                         ->name('admin.showLoginForm');
    Route::post('/login', 'Auth\AdminLoginController@login')                                            ->name('admin.login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')                                          ->name('admin.logout');

    Route::get('/profile/{profile}/edit', 'AdminController@edit')                                       ->name('adminProfile.edit');
    Route::match(['PUT', 'PATCH'], '/profile/{profile}', 'AdminController@update')                      ->name('adminProfile.update');

    Route::resource('/client', 'ClientController', ['except' => ['show']]);
    Route::match(['PUT', 'PATCH'], '/client/activate/{client}', 'ClientController@activate')            ->name('client.activate');
    Route::match(['PUT', 'PATCH'], '/client/deactivate/{client}', 'ClientController@deactivate')        ->name('client.deactivate');

});

// user site routes
Route::get('/', 'Auth\ClientLoginController@loginForm')                                                 ->name('showLoginForm');
Route::post('/', 'Auth\ClientLoginController@login')                                                    ->name('login');
Route::post('/logout', 'Auth\ClientLoginController@logout')                                             ->name('logout');

Route::resource('/profile', 'ClientProfileController', ['only' => ['edit', 'update']]);

Route::resource('/schedule', 'ScheduleController', ['except' => ['show']]);

