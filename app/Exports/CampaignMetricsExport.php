<?php

namespace App\Exports;

use App\Models\CampaignMetric;
use Maatwebsite\Excel\Concerns\FromCollection;

class CampaignMetricsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CampaignMetric::all();
    }
}
