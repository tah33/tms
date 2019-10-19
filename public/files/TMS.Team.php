<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable=['name','leader_name'];
    public function members()
    {
        return $this->hasMany(Member::class);
    }
    public function project()
    {
        return $this->hasOne(Project::class);
    }
}
