<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
   protected $table = 'campaigns';
	protected $fillable = [
		'name',
		'state',
		'buget',
		'company_id',
	];
	public function campaignMetric() {
		return $this->hasMany(CampaignMetric::class);
	}
	 public function company()
    {
        return $this->belongsTo(Company::class);
    }

      
}
