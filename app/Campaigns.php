<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
	protected $table = 'campaigns';
	protected $fillable = [
		'name',
		'state'
	];
}
