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
require __DIR__.'/auth.php';
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>['auth:web','checkAdmin'],'prefix' => 'admin'], function () {
    Route::get('/dashboard','HomeController@dashboard');
    Route::resource('articles','ArticleController');
    Route::post('articles/delete/{id}', 'ArticleController@destroy')->name('articles.delete');
    Route::post('article-image','ArticleController@imageUpload')->name('article.image');
    Route::resource('technologies','TechnologyController');
    Route::post('technologies/delete/{id}', 'TechnologyController@destroy')->name('technologies.delete');
    Route::post('technologies-image','TechnologyController@imageUpload')->name('technologies.image');
    Route::resource('news','NewsController');
    Route::post('news/delete/{id}', 'NewsController@destroy')->name('news.delete');
    Route::post('news-image','NewsController@imageUpload')->name('news.image');
    Route::resource('slides','SlideController');
    Route::post('slides/delete/{id}', 'SlideController@destroy')->name('slides.delete');
    Route::post('slides-image','SlideController@imageUpload')->name('slides.image');
    Route::post('users/change/{id}', 'UserController@levelChange')->name('users.change');
    Route::post('users/delete/{id}', 'UserController@destroy')->name('users.delete');
    Route::get('users', 'UserController@index')->name('users.index');
});


