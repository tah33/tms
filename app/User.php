<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
/**
* Check one role
* @param string $role
*/
    public function hasRole($role)
    {
        if($this->roles()->where('name',$role)->first())
            return true;
        else
            return false;
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimeStamps();
    }

}
