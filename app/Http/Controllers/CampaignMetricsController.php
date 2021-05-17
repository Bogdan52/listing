<?php

namespace App\Http\Controllers;

use App\Models\CampaignMetric;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CampaignMetricsImport;
class CampaignMetricsController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{
			$campaign= Campaign::find($request->id);
			$campaignmetrics=CampaignMetric::where('campaign_id','=',$request->id)->where('date','>=',$request->startDate)->where('date','<=',$request->endDate)->get();
			return response()->json(['html' => view('campaignmetric',['campaign'=>$campaign,'campaignmetrics'=>$campaignmetrics,'startDate'=>$request->startDate,'endDate'=>$request->endDate])->render()]);
		}
		public function import(Request $request)
				{
					$request->validate([
						 'file' => 'required'
					]);
					Excel::import(new CampaignMetricsImport,  $request->file('file')->store('temp'));
					return back();
				}
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
				//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
				//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\CampaignMetric  $campaignMetric
		 * @return \Illuminate\Http\Response
		 */
		public function show(CampaignMetric $campaignMetric)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\CampaignMetric  $campaignMetric
		 * @return \Illuminate\Http\Response
		 */
		public function edit(CampaignMetric $campaignMetric)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\CampaignMetric  $campaignMetric
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, CampaignMetric $campaignMetric)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\CampaignMetric  $campaignMetric
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(CampaignMetric $campaignMetric)
		{
				//
		}
}
