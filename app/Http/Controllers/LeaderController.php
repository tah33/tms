<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use App\Team;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class LeaderController extends Controller
{
    public function memberList($id)
    {
        $team=Team::find($id);
        return view('leader.users',compact('team'));
    }
    public function projectList($id)
    {
        $team=Team::find($id);
        return view('leader.projects',compact('team'));
    }
    public function incompleteList($id)
    {
        $project=Project::where('team_id',$id)->where('status',0)->first();
        return view('leader.incomplete',compact('project'));
    }
   /* public function taskList($id)
    {
        $project=Project::find($id);
        $tasks=Task::has('user')->whereHas('project',function($query) use ($id){
            $query->where('project_id',$id);
        })->get();
        return view('leader.tasks',compact('tasks'));
    }*/
}
