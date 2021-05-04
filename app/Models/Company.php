<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
	protected $fillable = [
		'name',
		'adres',
		'cui',
	];
	public function campaigns() {
		return $this->hasMany(Campaign::class);
	}
	public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function invites()
    {
        return $this->hasMany(Invites::class);
    }
}
