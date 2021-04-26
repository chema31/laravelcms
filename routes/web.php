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

Route::get('/', 'App\Http\Controllers\HomeController@index');

/**
 * Administrator routes
 */

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['admin'])->name('dashboard');

Route::resource('/admin/pages', 'App\Http\Controllers\Admin\PagesController')->except('show')->middleware('admin');
Route::resource('/admin/posts', 'App\Http\Controllers\Admin\PostsController')->except('show')->middleware('admin');
Route::resource('/admin/users', 'App\Http\Controllers\Admin\UsersController')->except('show');

require __DIR__.'/auth.php';
