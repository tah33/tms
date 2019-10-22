<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\User;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class LeaderController extends Controller
{
    public function memberList()
    {
        $users=User::all()->except([1,Auth::id()]);
        return view('leader.users',compact('users'));
    }
    public function projectList($id)
    {
        $team=Team::find($id);
        return view('leader.projects',compact('team'));
    }
    public function incompleteList($id)
    {
        $projects=Project::where('team_id',$id)->where('status',0)->get();
        return view('leader.incomplete',compact('projects'));
    }
    public function taskList($id)
    {
        $project=Project::find($id);
        $tasks=Task::has('user')->whereHas('project',function($query) use ($id){
            $query->where('id',$id);
        })->get();
        return view('leader.tasks',compact('tasks'));
    }
}
