<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable= [
      'team_id', 'title', 'requirements','submission_date','status'
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
