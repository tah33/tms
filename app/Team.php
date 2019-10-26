<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable =['name','leader_id'];
    protected $casts=['member_id' => 'array'];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
    public function incomplete($status)
    {
        if($this->projects()->where('status',$status)->latest()->first())
            return $this->projects()->latest()->first()->id;
        else
            return false;
    }
}
