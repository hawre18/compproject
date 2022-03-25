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
Route::group(['namespace'=>'App\Http\Controllers\Admin','middleware'=>['auth:web'],'prefix' => 'admin'], function () {
    Route::get('/dashboard','HomeController@dashboard');
    Route::resource('articles','ArticleController@dashboard');
    Route::post('articles/delete/{id}', 'ArticleController@destroy')->name('articles.delete');
    Route::post('article-image','ArticleController@imageUpload')->name('article.image');
    Route::resource('technologies','TechnologyController');
    Route::post('technologies/delete/{id}', 'TechnologyController@destroy')->name('technologies.delete');
    Route::post('technologies-image','TechnologyController@imageUpload')->name('technologies.image');
    Route::resource('news','NewsController');
    Route::post('news/delete/{id}', 'NewsController@destroy')->name('news.delete');
    Route::post('news-image','NewsController@imageUpload')->name('news.image');
});


