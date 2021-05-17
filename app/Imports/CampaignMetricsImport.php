<?php

namespace App\Imports;

use App\Models\CampaignMetric;
use Maatwebsite\Excel\Concerns\ToModel;

class CampaignMetricsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CampaignMetric([
        'date'=>$row[3],
        'click'=>$row[0],
        'views'=>$row[1],
        'spent'=>$row[2],
        'campaign_id'=>$row[4],
        ]);
    }
}
