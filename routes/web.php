<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Campaigns;
use App\Data;
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
		return view('list');
});
Route::get('/submit', function () {
		return view('submit');
});
Route::post('/submit', function (Request $request) {
	 
	 $data=$request->validate([
			'buget'=> 'required|numeric|min:0',
			'name' => 'required|max:255'
		]);
		$campaign = Campaigns::create([
			'name' => $request->name,
			'state'=> 'draft'
		]);
		$campaign_data= Data::create([
			'buget'=> $request->buget,
			'click'=>'0',
			'views'=>'0',
			'spent'=>'0',
			'campaign_id'=>$campaign->id
		]);
		$campaigns_data =$campaign_data->save();
		$campaigns = $campaign->save();
	
		return redirect('/');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
