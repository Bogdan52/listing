<?php

namespace App\Imports;

use App\Models\Campaign;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class CampaignsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Campaign([
        'name'=> $row[0],
        'state'=> $row[1],
        'buget'=> $row[2],
        'company_id'=> $row[3],

        ]);
    }
}
