
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Data;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/user','UsersController@index')->middleware('auth');
//Route::get('/campaigns','CampaignsController@index')->middleware('auth');

Route::get('/user/submit', 'CompaniesController@submit')->middleware('auth');
Route::post('/user/submit', 'CompaniesController@store')->middleware('auth');
Route::get('/user/company/{id}', 'CompaniesController@index')->middleware('auth');
Route::get('/user/company/{id}/campaigns', 'CampaignsController@index')->middleware('auth');
Route::get('/company/{id}/campaigns_list', 'CampaignsController@campaigns_list')->middleware('auth');



Route::get('/user/company/{id}/campaigns/submit', 'CampaignsController@submit')->middleware('auth');
Route::post('/user/company/{id}/campaigns/submit', 'CampaignsController@store')->middleware('auth');
Auth::routes();

Route::get('/user', 'UsersController@index')->name('home')->middleware('auth');
