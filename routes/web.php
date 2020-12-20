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

//login
Route::get('/', function () {
    return redirect('login');
});
Route::post('control/login','Auth\UserLoginController@index')->name('user_login');
Route::get('user_logout','Auth\UserLoginController@logout');

Route::group(['middleware' => ['user_validate']], function () {
//user
Route::get('user','UserController@index');

//blogs
Route::get('blogs', 'BlogController@index')->name('blogs');
Route::get('create-blog','BlogController@show_create')->name('create-blog');
Route::post('add-blog','BlogController@blog_create')->name('add-blog');
Route::get('show-blog/{id}','BlogController@show_edit')->name('show-blog');
Route::post('blog-edit/{id}','BlogController@blog_edit')->name('blog-edit');
Route::post('delete-blog','BlogController@blog_delete')->name('blog-delete');
Route::post('multi-delete-blog','BlogController@multi_blog_delete')->name('multi-blog-delete');
Route::post('publish/change','BlogController@change_publish');
Route::get('blog_data', 'BlogController@blog_data');

//cms
Route::get('about_us','CmsController@aboutus');

//category
Route::post('multi-delete-category','CategoryController@multi_category_delete')->name('multi-category-delete');
Route::resource('categories','CategoryController');
Route::get('category_data', 'CategoryController@category_data');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
