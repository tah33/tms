<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable= [
      'team_id', 'title', 'requirements', 'file','submission_date'
    ];
    protected $casts =[
        'file'=>'array'
    ];
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
