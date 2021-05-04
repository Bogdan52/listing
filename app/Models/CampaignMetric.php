<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignMetric extends Model
{
    
    protected $table = 'campaign_metrics';
	 protected $fillable = [
		'date',
		'click',
		'views',
		'spent',
		'campaign_id'
	];

	public function campaign() {
		return $this->belongsTo(Campaign::class);
	}
}
