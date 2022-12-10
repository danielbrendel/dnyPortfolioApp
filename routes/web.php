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

Route::get('/', 'MainController@index');
Route::get('/news', 'MainController@news');
Route::get('/tech', 'MainController@tech');
Route::get('/discord', 'MainController@discord');
Route::get('/imprint', 'MainController@imprint');

Route::get('/products/asatruphp', 'ProductsController@asatruphp');
Route::get('/products/dnys', 'ProductsController@dnys');
Route::get('/products/danigram', 'ProductsController@danigram');
Route::get('/products/actifisys', 'ProductsController@actifisys');
Route::get('/products/astarlove', 'ProductsController@astarlove');
Route::get('/products/cdg', 'ProductsController@cdg');
Route::get('/products/cge', 'ProductsController@cge');
Route::get('/products/cpw', 'ProductsController@cpw');
Route::get('/products/blackspace', 'ProductsController@blackspace');
Route::get('/products/solitarius', 'ProductsController@solitarius');
Route::get('/products/corvuschat', 'ProductsController@corvuschat');
Route::get('/products/ufw', 'ProductsController@ufw');

Route::get('/services/geekflash', 'ServicesController@geekflash');
Route::get('/services/lachanfall', 'ServicesController@lachanfall');
Route::get('/services/astarlove', 'ServicesController@astarlove');
Route::get('/services/gamingpals', 'ServicesController@gamingpals');
Route::get('/services/helprealm', 'ServicesController@helprealm');
Route::get('/services/webframeworkdb', 'ServicesController@webframeworkdb');
Route::get('/services/mittelalterevents', 'ServicesController@mittelalterevents');
Route::get('/services/gamedevscreens', 'ServicesController@gamedevscreens');
Route::get('/services/steamwidgets', 'ServicesController@steamwidgets');
Route::get('/services/acr', 'ServicesController@acr');
Route::get('/services/redhotsubs', 'ServicesController@redhotsubs');

Route::get('/gamejam/theme', 'MainController@gamejam');