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


// Website
Route::get('/', 'syahrinsethController@home')->name('/');
// Contact
Route::post('/contact/send', 'syahrinsethController@contactSend')->name('contactSend');




// --------------------------------------------------------------------------
// Admin Site
// Login
Auth::routes();
Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('/');
})->name('logout');
// Dashboard
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
// Blog
Route::get('/blog', 'syahrinsethAdminBlogController@index')->name('blogAdmin.index');
Route::get('/blog/create-post', 'syahrinsethAdminBlogController@create')->name('blogAdmin.create');
Route::post('/blog/{slug}', 'syahrinsethAdminBlogController@store')->name('blogAdmin.store');
Route::delete('/blog/{slug}', 'syahrinsethAdminBlogController@destroy')->name('blogAdmin.destroy');
Route::get('/blog/{slug}/', 'syahrinsethAdminBlogController@show')->name('blogAdmin.show');

