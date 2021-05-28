<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignMetric;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CampaignsImport;
use App\Exports\CampaignsExport;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Image;
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
					return view('campaigns',['id'=>$id]);
				} else {
					echo 'Not Authorized.';
				}
		}

		public function create($id)
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
			$campaigns= Campaign::where('company_id','=',$id)
			->filter( ['state' => $request->states])
			->where('buget','<=',$request->max_buget)
			->orderBy($request->value,$request->direction);
			

			if(!empty($request->search))
			{

				$wordArray=explode(" ", $request->search);
				
					$campaigns=$campaigns->where(function($camp)use($wordArray) {
							foreach ($wordArray as $word) {
							 $camp->orWhere('name', 'like', '%'.$word.'%');
							}
						});
			}
			$campaigns=$campaigns->paginate($request->rows,['*'],'page');
			return response()->json(['html' => view('campaigns_lists',['campaigns'=>$campaigns])->render(),'htmlt' => view('campaigns_list_table',['campaigns'=>$campaigns])->render()]);
		}
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */

	 public function export(Request $request) 
		{	
			 return  Excel::download(new CampaignsExport($request), 'campaigns-collection.csv');
			
		}
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request,$id)
		{
				

				$data=$request->validate([
						'buget'=> 'required|numeric|min:0',
						'name' => 'required|max:255',
						'start_date'=>'required|date',
						'end_date'=>'required|date',
						'file'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
				]);
				
				$campaign = Campaign::create([
						'name' => $request->name,
						'state'=> 'draft',
						'buget'=> $request->buget,
						'start_date'=>$request->start_date,
						'end_date'=>$request->end_date,
						'cimage'=>"",
						//'company_id'=>$id
				]);

				$campaign_metric= CampaignMetric::create([
						'date'=>Carbon::now(),
						'click'=>'0',
						'views'=>'0',
						'spent'=>'0',
						'campaign_id'=>$campaign->id
				]);
				//$comp= Company::where('id','=',$id)->get();
				$campaign->company()->associate($id);
				$campaign_metrics =$campaign_metric->save();
				$campaigns = $campaign->save();
		
				return redirect()->route('company_campaigns',['id'=>$id]);
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
		public function updateState(Request $request)
		{	
				 $campaign = Campaign::find($request->id);
				 $campaign->state = $request->state;
				 $campaign->save();
				 return response ()->json ( $campaign );
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Campaign  $campaign
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Request $request)
		{
			//dd($id);
			$user = Auth::user();
			$company = Company::find($request->cid);

			if ($user->can('view', $company)) 
			{
				$camp=Campaign::find($request->id);
				$camp->campaignMetric()->delete();
				$camp->delete();	
			}
		}
}
