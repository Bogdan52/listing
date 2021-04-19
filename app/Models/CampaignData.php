<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignData extends Model
{
	 protected $table = 'campaigns_data';
	 protected $fillable = [
		'buget',
		'click',
		'views',
		'spent',
		'campaign_id'
	];

	public function campaign() {
		return $this->belongsTo(Campaign::class);
	}
}
