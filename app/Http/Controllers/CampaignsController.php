<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignData;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;
class CampaignsController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index($id)
		{			
			$user = Auth::user();
				$company = Company::find($id);
		if ($user->can('view', $company)) {
					$campaigns= Campaign::where('company_id','=',$id)->with('campaignData')->get();
								return view('campaigns',['campaigns' => $campaigns,'id'=>$id]);
								 } else {
			echo 'Not Authorized.';
		}
		}

		public function submit($id)
		{
			$user = Auth::user();
				$company = Company::find($id);
		if ($user->can('view', $company)) {
								 return view('submit',['id' => $id]);
								 } else {
			echo 'Not Authorized.';
		}
		}
		public function campaigns_list(Request $request,$id)
		{	
			
			//$request = Request::all();

			$campaigns= Campaign::join('campaigns_data', 'campaigns.id', '=', 'campaigns_data.campaign_id')->where('company_id','=',$id)->orderBy($request->value,$request->direction )->paginate(10);

			// if ($request->ajax()) {
			return response()->json(['html' => view('campaigns_lists',['campaigns'=>$campaigns])->render()]);
			//}

			//    return view('campaigns_list', compact('campaigns'));
				//return response()->json(['id'=>'2','name'=>'Test1','buget'=>'2']);
		}
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request,$id)
		{
			//	dd($id);
				$data=$request->validate([
						'buget'=> 'required|numeric|min:0',
						'name' => 'required|max:255'
				]);
				
				$campaign = Campaign::create([
						'name' => $request->name,
						'state'=> 'draft',
						//'company_id'=>$id
				]);
				$campaign_data= CampaignData::create([
						'buget'=> $request->buget,
						'click'=>'0',
						'views'=>'0',
						'spent'=>'0',
						'campaign_id'=>$campaign->id
				]);
				//$comp= Company::where('id','=',$id)->get();
				$campaign->company()->associate($id);
				$campaigns_data =$campaign_data->save();
				$campaigns = $campaign->save();
		
				return redirect('/user/company/'.$id.'/campaigns');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\Campaign  $campaign
		 * @return \Illuminate\Http\Response
		 */
		public function show(Campaign $campaign)
		{
			 
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Campaign  $campaign
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Campaign $campaign)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\Campaign  $campaign
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Campaign $campaign)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Campaign  $campaign
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Campaign $campaign)
		{
				//
		}
}
