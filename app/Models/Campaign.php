<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
   protected $table = 'campaigns';
	protected $fillable = [
		'name',
		'state'
	];
	public function campaignData() {
		return $this->hasOne(CampaignData::class);
	}
	 public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
