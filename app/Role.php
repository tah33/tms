<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];
    
     public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
   
 	 public function getRoleNameAttribute($value)
    {
        return ucwords($this->name);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimeStamps();
    }
    public function hasPermission($permission)
    {
        return null !== $this->permissions()->whereIn('id', $permission)->first();
    }
       
}
