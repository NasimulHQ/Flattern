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

Route::get('/', 'FrontEndController@index');
Route::get('/portfolio', 'FrontEndController@Actionportfolio');
Route::get('/portfolio-details/{slug}', 'FrontEndController@ActionportfolioDetails');
Route::get('/blog', 'FrontEndController@Actionblogleft');
Route::get('/blog-details/{slug}', 'FrontEndController@Actionpostleft');
Route::get('/contact-us', 'FrontEndController@Actioncontact');
Route::get('/blog/search', 'FrontEndController@actionSearch');
Route::post('/send-mail', 'FrontEndController@actionSendMail');

Route::prefix('admin')->group(function (){
    Auth::routes(['verify'=>true]);
    Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
});

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'verified'])->group(function (){
    Route::resources([
        'slider'=>'SliderController',
        'feature'=>'FeatureController',
        'client'=>'ClientController',
        'portfilo-category'=>'PortfiloCategoryController',
        'blog-category'=>'BlogCategoryController',
        'blog-tag'=>'BlogTagController',
        'portfilo'=>'PortfiloController',
        'blog'=>'BlogController',
        'users'=>'UserController',
    ]);
    Route::get('/users-data', 'DataController@getAllUserdata');
});


