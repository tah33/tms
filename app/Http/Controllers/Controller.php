<?php

namespace App\Http\Controllers;
use App\Project;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Route;
use App\Role;
use App\User;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function homecopy()
    {
        if(Auth::user()->hasRole('super admin'))
        {
            $user=User::all()->except(Auth::user()->id);
            $users=User::whereMonth('created_at', Carbon\Carbon::now()->month)->get()
                ->except(Auth::user()->id);
            $teams=Team::all()->count();
            $projects=Project::all();
            $incomplete=Project::where('status','Not Done')->get()->count();
            $activities=DB::table('users')
                ->join('activities','users.id','activities.user_id')
                ->select('users.name','activities.*')->paginate(10);
            return view('super_admin.home',compact('user','users','teams','projects','incomplete','activities'));
        }
        elseif (Auth::user()->hasRole('admin'))
        {
            $teams=Team::all()->count();
            $incomplete=Project::where('status',0)->get()->count();
            $projects=Project::all();
            return view('admin.home',compact('teams','projects','incomplete'));
        }
        elseif (Auth::user()->hasRole('member')) {
             $team = $project_tasks = $tasks = $project = '';
             $team = Team::whereHas('users', function ($query) {
                 $query->where('email', Auth::user()->email);
             })->first();
             if ($team->projects()->exists()) {
                 $project = Project::where('team_id', $team->id)->latest()->first();
                 if ($project->tasks()->exists())
                     $project_tasks = Task::where('member_id', Auth::id())->where('project_id',$project->id)->get();
             }
             if (!empty($team->leader_id)) {
                 $memberlist = $progress = [];
                 if (!empty($project)) {
                     if ($project->tasks()->exists()) {
                         $tasks = Task::select('users.email', 'tasks.*')
                             ->join('users', 'tasks.member_id', 'users.id')
                             ->join('projects', 'tasks.project_id', 'projects.id')
                             ->where('projects.id', $project->id)->latest()->get();
                         foreach ($tasks as $task) {
                             $memberlist[] = $task->member_id;
                             $progress[] = $task->progress;
                         }
                     }
                 }
                 if ($team->leader_id == Auth::id()) {
                     return view('leader.home', compact('team', 'project', 'memberlist', 'tasks', 'progress'))
                         ->with('msg', 'You Need to approve some tasks');
                 }
             }
            return view('members.home', compact('project', 'team', 'project_tasks'));
        }
    }
}
