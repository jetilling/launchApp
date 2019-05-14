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

Route::get('/enter-code', 'EntranceCodeController@index')->name('login');
Route::post('/enter-code', 'EntranceCodeController@verifyCode');

Route::prefix('build')->group(function () {

    Route::get('/basics', 'BasicsController@index');
    Route::post('/basics', 'BasicsController@store');
    // Route::get('/authentication', '');
    // Route::get('/user-profiles', '');
    // Route::get('/dashboard', '');
    // Route::get('/users', '');
    // Route::get('/pages', '');
    // Route::get('/monetization', '');
    // Route::get('/uploader', '');
    // Route::get('/third-party-services', '');

    Route::get('/confirm', 'BuildConfirmationController@index');
    Route::post('/confirm', 'BuildConfirmationController@confirm');

    Route::get('/complete', 'BuildCompleteController@index');

});

