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

				if(empty($request->states)){
								if(empty($request->search))
								{
										$campaigns= Campaign::where('company_id','=',$request->id)
										->where('buget','<=',$request->max_buget)
										->orderBy($request->value,$request->direction)
										->paginate($request->rows);
								}else
								{
								$campaigns= Campaign::where('company_id','=',$request->id)
										->where('buget','<=',$request->max_buget)
										->where('name', 'LIKE', '%'.$request->search.'%')
										->orderBy($request->value,$request->direction)
										->get();
								}
								}
								else
								{
										if(empty($request->search)){
										$campaigns= Campaign::where('company_id','=',$request->id)
										->filter( ['state' => $request->states] )
										->where('buget','<=',$request->max_buget)
										->orderBy($request->value,$request->direction)
										->get();
								}else{
										$campaigns= Campaign::where('company_id','=',$request->id)
										->filter( ['state' => $request->states] )
										->where('buget','<=',$request->max_buget)
										->where('name', 'LIKE', '%'.$request->search.'%')
										->orderBy($request->value,$request->direction)
										->get();
								}
		}
		return $campaigns;
		}
		public function headings(): array
		{
			 return ["id", "name", "state","buget","company_id","d1","d2"];
		}
}
