<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=['name','controller'];
    public function roles()
    {
    	return $this->belongsToMany(Role::class)->withTimeStamps();
    }
    public function getPermissionNameAttribute($value)
    {
        return  "Can " .ucwords($this->name)." ";
    }
}
