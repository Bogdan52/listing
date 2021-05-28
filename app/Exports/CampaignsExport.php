<?php

namespace App\Exports;

use App\Models\Campaign;
use App\Models\CampaignMetrics;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CampaignsExport implements FromCollection,WithHeadings
{
		/**
		* @return \Illuminate\Support\Collection
		*/
	public function __construct($request)
		{
				$this->request = $request;
		}

		public function collection()
		{
			$request= $this->request;

			$campaigns= Campaign::where('company_id','=',$request->id)
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

			$campaigns=$campaigns->join('campaign_metrics','campaigns.id','=', 'campaign_metrics.campaign_id');

			$campaigns=$campaigns->get();
			return $campaigns;
		}
		public function headings(): array
		{
			 return ["id", "name", "state","buget","company_id","d1","d2","clicks","views","spent","date","campaign_id"];
		}
}
