<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
     protected $table = 'users';
	protected $fillable = [
		'name',
		'email',
		'password'
	];

	protected $hidden = [
        'password', 'remember_token',
    ];
	protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function invites()
    {
        return $this->hasMany(Invites::class);
    }


}
