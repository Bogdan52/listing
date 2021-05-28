<?php

namespace App\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
	use Filterable;
   protected $table = 'campaigns';
	protected $fillable = [
		'name',
		'state',
		'buget',
		'start_date',
		'end_date',
		'cimage',
		'company_id',
	];
	private static $whiteListFilter = ['*'];
     protected $guarded = [];


	public function campaignMetric() {
		return $this->hasMany(CampaignMetric::class);
	}
	 public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
