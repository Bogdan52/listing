<?php

namespace App\Exports;

use App\Models\Campaign;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CampaignsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
	public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return Campaign::where('company_id','=',$this->id)->get();
    }

    public function headings(): array
    {
       return ["id", "name", "state","buget","company_id","d1","d2"];
    }
}
