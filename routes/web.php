
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignMetric;
use App\Models\Invite;
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
Route::middleware('auth')->group(function () {


Route::get('/user','UsersController@index')->name('user_index');

//Route::get('/campaigns','CampaignsController@index')->middleware('auth');

Route::get('/user/company/{id}', 'CompaniesController@index')->name('company_index');
Route::get('/company/create', 'CompaniesController@create')->name('company_create');
Route::post('/company/create', 'CompaniesController@store')->name('company_store');
Route::delete('/company/delete', 'CompaniesController@destroy')->name('company_delete');
Route::get('/company/company_list', 'CompaniesController@company_list')->name('company_list');

Route::get('/company/{id}/campaigns', 'CampaignsController@index')->name('company_campaigns');
Route::get('/company/{id}/campaigns_list', 'CampaignsController@campaigns_list')->name('campaigns_list');
Route::post('/campaigns/import', 'CampaignsController@import')->name('campaigns_import');

Route::get('/user/user_list', 'UsersController@user_list')->name('user_list');


Route::delete('/campaigns/delete', 'CampaignsController@destroy')->name('campaign_delete');
Route::post('/campaigns/update', 'CampaignsController@updateState')->name('campaign_update');
Route::get('/company/{id}/campaigns/create', 'CampaignsController@create')->name('campaign_create');
Route::post('/company/{id}/campaigns/create', 'CampaignsController@store')->name('campaign_store');

Route::post('/invite/create', 'InvitesController@store')->name('invite_create');
Route::get('/invite/invites_list', 'InvitesController@invites_list')->name('invites_list');
Route::delete('/invite/delete', 'InvitesController@destroy')->name('invite_delete');
Route::post('/invite/accept', 'InvitesController@accept')->name('invite_accept');

Route::get('/test', function () {
    return view('test');
})->name('test');

Route::get('/campaignmetric/index', 'CampaignMetricsController@index')->name('campaignmetrics_index');

Route::post('file-import', 'CampaignMetricsController@import')->name('file-import');
Route::get('file-export', 'CampaignsController@export')->name('file-export');

});
Auth::routes();

//Route::get('/user', 'UsersController@index')->name('home');