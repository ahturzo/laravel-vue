<?php

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

Route::get('/', 'PublicController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function()
{
    // Backend Routes
    Route::group([
        'namespace' => 'Backend',
        'middleware' => ['auth'],
    ], function ()
    {
//        Route::group([ 'prefix' => 'post', 'as' => 'post.' ], function () {
//            Route::post('add_category', 'CategoryController@add_category');
//        });
        Route::resource('post', 'PostController');

        Route::resource('category', 'CategoryController');

    });
});

Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
Route::get('/{anypath}/{id}', 'HomeController@index')->where('path', '.*');

