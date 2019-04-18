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

// Blog
Route::get('/blog/{slug}', 'syahrinsethBlogController@show')->name('show.blog');
Route::get('/blog', 'syahrinsethBlogController@index')->name('index.blog');
Route::get('/blog/category/{id}', 'syahrinsethBlogController@indexCategory')->name('indexCategory.blog');
Route::post('/blog/create-blog-comment/{id}', 'syahrinsethBlogController@createBlogComment')->name('create_blog_comment.blog');

// Portfolio
Route::get('/portfolio', 'syahrinsethPortfolioController@index')->name('index.portfolio');
Route::get('/portfolio/{id}', 'syahrinsethPortfolioController@show')->name('show.portfolio');
Route::get('/portfolio/ajax-show/{id}', 'syahrinsethPortfolioController@ajaxShow')->name('ajaxShow.portfolio');






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
Route::get('/admin-blog', 'syahrinsethAdminBlogController@index')->name('index.adminblog');
Route::get('/admin-blog/create-post', 'syahrinsethAdminBlogController@create')->name('create.adminblog');
Route::post('/admin-blog/store-post', 'syahrinsethAdminBlogController@store')->name('store.adminblog');
Route::get('/admin-blog/edit-post/{id}', 'syahrinsethAdminBlogController@edit')->name('edit.adminblog');
Route::post('/admin-blog/update-post/{id}', 'syahrinsethAdminBlogController@update')->name('update.adminblog');
Route::get('/admin-blog/delete/{id}', 'syahrinsethAdminBlogController@delete')->name('delete.adminblog');
Route::post('/admin-blog/destroy/{id}', 'syahrinsethAdminBlogController@destroy')->name('destroy.adminblog');
Route::get('/admin-blog/{slug}/', 'syahrinsethAdminBlogController@show')->name('show.adminblog');

// Message
// Route::get('/admin-message', 'syahrinsethAdminMessageController@index')->name('index.adminmessage');
// Route::get('/admin-message/{id}', 'syahrinsethAdminMessageController@show')->name('show.adminmessage');
// Route::get('/admin-message/delete/{id}', 'syahrinsethAdminMessageController@delete')->name('delete.adminmessage');
// Route::post('/admin-message/destroy/{id}', 'syahrinsethAdminMessageController@destroy')->name('destroy.adminmessage');
// Route::get('admin-message/ajax/{id}', 'syahrinsethAdminMessageController@ajax')->name('ajax.adminmessage');

// Portfolio
Route::get('admin-portfolio', 'syahrinsethAdminPortfolioController@index')->name('index.adminportfolio');
Route::get('admin-portfolio/create', 'syahrinsethAdminPortfolioController@create')->name('create.adminportfolio');
Route::post('admin-portfolio/store', 'syahrinsethAdminPortfolioController@store')->name('store.adminportfolio');
Route::get('admin-portfolio/{id}', 'syahrinsethAdminPortfolioController@show')->name('show.adminportfolio');
Route::get('admin-portfolio/edit/{id}', 'syahrinsethAdminPortfolioController@edit')->name('edit.adminportfolio');
Route::post('admin-portfolio/update/{id}', 'syahrinsethAdminPortfolioController@update')->name('update.adminportfolio');
Route::get('admin-portfolio/delete/{id}', 'syahrinsethAdminPortfolioController@delete')->name('delete.adminportfolio');
Route::post('admin-portfolio/destroy/{id}', 'syahrinsethAdminPortfolioController@destroy')->name('destroy.adminportfolio');
// --------------------------------------------------------------------------

//Alternate route for access storage file due to cpanel hosting security issue
Route::get('storage/portfolio/{filename}', function ($filename)
{
    if (!Storage::exists('public/portfolio/'.$filename)) {
        abort(404);
    }
    $file = Storage::get('public/portfolio/'.$filename);
    $type = Storage::mimeType('public/portfolio/'.$filename);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('storage/blog/{filename}', function ($filename)
{
    if (!Storage::exists('public/blog/'.$filename)) {
        abort(404);
    }
    $file = Storage::get('public/blog/'.$filename);
    $type = Storage::mimeType('public/blog/'.$filename);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
