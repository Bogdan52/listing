<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
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
		return $this->belongsTo(Campaigns::class);
	}
}
