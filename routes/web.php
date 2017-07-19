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

Route::get('/', ['as'=>'home','uses'=>'IndexController@home']);	
Route::get('/about', ['as'=>'about','uses'=>'IndexController@about']);	
Route::get('/master/{href?}', ['as'=>'master','uses'=>'IndexController@master']);
Route::get('/master_works/{href?}', ['as'=>'master','uses'=>'IndexController@masterWorks']);
Route::get('/masters', ['as'=>'masters','uses'=>'IndexController@masters']);	
//Route::get('/categories', ['as'=>'categories','uses'=>'IndexController@categories']);

// Route::get('/catalog/{href?}', ['as'=>'catalog','uses'=>'CatalogController@index']);
Route::get('/catalog/{href?}', ['as'=>'catalog','uses'=>'IndexController@catalog']);

Route::get('/blog/{id?}', ['as'=>'blog','uses'=>'IndexController@blog']);
Route::get('/contacts', ['as'=>'contacts','uses'=>'IndexController@contacts']);
Route::get('/cart', ['as'=>'cart','uses'=>'IndexController@cart']);

Route::get('auth/{provider}', 'AuthC@redirectToProvider');
Route::get('auth/{provider}/callback', 'AuthC@handleProviderCallback');

Route::get('/product/{href?}', ['as'=>'product','uses'=>'IndexController@product']);
Route::get('/article/{id}', ['as'=>'article','uses'=>'IndexController@article']);
Route::get('/blog_popular', ['as'=>'blog_popular','uses'=>'IndexController@blog_popular']);
Route::get('/how_buy', ['as'=>'how_buy','uses'=>'IndexController@how_buy']);
Route::get('/links', ['as'=>'links','uses'=>'IndexController@links']);
Route::get('/dashboard', ['as'=>'dashboard','uses'=>'IndexController@dashboard']);
Route::get('/search', ['as'=>'search','uses'=>'IndexController@search']);
Route::get('/setlocale/{locale}', ['uses' => 'IndexController@setLang']);
Route::get('/setcurrency/{currency}', ['uses' => 'IndexController@setCurrency']);
Route::get('/logout', 'IndexController@logout');

Route::post('/checkout', ['as'=>'cart','uses'=>'IndexController@postCartCheckout']);

Route::post('/addproduct', ['as'=>'cart','uses'=>'IndexController@addProduct']);
Route::post('/deleteproduct', ['as'=>'cart','uses'=>'IndexController@deleteProduct']);

Route::post('/catalog', 'IndexController@catalogPost');
Route::post('/dashboard', ['as'=>'dashboard','uses'=>'IndexController@dashboard']);
Route::post('/login', 'IndexController@postUserLogin');
Route::post('/register', 'IndexController@postUserRegister');
Route::post('/logout', 'IndexController@postLogOut');
Route::post('/feedback', 'IndexController@feedback');
Route::post('/subscribe', 'IndexController@subscribe');
Route::get('/unsubscribe/{email}', 'IndexController@unsubscribe');

Route::group(['middleware' => 'auth'], function() {
// lots of routes that require auth middleware
});

/*Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');*/
//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
