<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable=['login_time','logout_time'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
