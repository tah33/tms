<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['module','member_id','file','progress','submit'];
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
    public function getProgressNameAttribute($value)
    {
        return ucwords($this->progress);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'member_id');
    }
}
