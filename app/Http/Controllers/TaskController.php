<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Task;
use App\Team;
use App\Project;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tasks = Task::has('user')->get();
            return view('tasks.index', compact('tasks'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user=User::find($id);
        $team=Team::where('id',$user->teams->first()->id)->first();
        $project=Project::where('team_id',$team->id)->latest()->first();
        return view('tasks.create',compact('user','project'));
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'module' => 'required|unique:tasks,module',
            'description' => 'required_without:file',
            'file' => 'required_without:description',
            'submit'=>"required|date|after_or_equal:tomorrow"
        ]);
        $project=Project::find($id);
        $task = new Task;
        if ($request->hasfile('file'))
        {
                $ext = $request->file->getClientOriginalName();
                $filename=$request->module.".".$ext;
                $request->file->move(public_path() . '/members/', $filename);
                $task->file = $filename;
        }
        $task->module=$request->module;
        $task->member_id=$request->member_id;
        $task->submit=$request->submit;
        $task->description=$request->description;
        $task->progress="pending";
        $project->tasks()->save($task);
        return redirect('home');
        return back();
    }
    public function show($id)
    {
        $task=Task::select('tasks.*','projects.id as p_id','projects.title','teams.name','teams.id as t_id','users.id as u_id','users.email')
            ->join('users','tasks.member_id','users.id')
            ->join('projects','projects.id','tasks.project_id')
            ->join('teams','projects.team_id','teams.id')
            ->where('tasks.id',$id)->first();
        return view('tasks.show',compact('task'));
    }

    public function edit($id)
    {
        $task=Task::select('tasks.*','projects.id as p_id','projects.title','teams.name','teams.id as t_id','users.id as u_id','users.email')
            ->join('users','tasks.member_id','users.id')
            ->join('projects','projects.id','tasks.project_id')
            ->join('teams','projects.team_id','teams.id')
            ->where('tasks.id',$id)->first();
        return view('tasks.edit',compact('task'));
    }
    public function update(Request $request, $id)
    {
          $request->validate([
              'module' => 'required|unique:tasks,module,'.$id,
              'description' => 'required_without:file',
              'file' => 'required_without:description',
              'submit'=>"required|date|after_or_equal:tomorrow"
        ]);
        $task = Task::find($id);
        $project=$task->project_id;
        $task->member_id = $request->member_id;
        $task->module = $request->module;
        $task->description=$request->description;
        $task->project_id = $project;
        $task->submit = $request->submit;
        if ($request->hasfile('file'))
        {
            $ext = $request->file->getClientOriginalName();
            $filename=$request->module.".".$ext;
            $request->file->move(public_path() . '/members/', $filename);
            $task->file = $filename;
        }
        $task->save();
        return redirect('home');
    }
    public function destroy($id)
    {
        Task::destroy($id);
        return back();
    }
    public function download($id){
        $file = Task::find($id);
        $path = public_path() . '/members/'.$file->file;
        return response()->download($path);
    }
    public function view($id){
        $file = Task::find($id);
        $path = public_path() . '/members/'.$file->file;
        return response()->file($path);
    }
    public function file($id){
        $task = Task::find($id);
        $task->file = null;
        $task->save();
        return back();
    }
    public function pending($id){
    $task = Task::find($id);
    $task->progress = "ongoing";
    $task->save();
    return back();
    }
    public function ongoing($id)
    {
        $task=Task::find($id);
        $task->progress="partial done";
        $task->save();
        return back();
    }
    public function approve()
    {
        $tasks=Task::select('tasks.*','projects.title','teams.name','users.email','teams.id as t_id')
            ->join('users','tasks.member_id','users.id')
            ->join('projects','projects.id','tasks.project_id')
            ->join('teams','projects.team_id','teams.id')
            ->where('teams.leader_id',Auth::id())
            ->where('tasks.progress','partial done')->get();
        return view('leader.approve',compact('tasks'));
    }
    public function approved($id)
    {
        $task=Task::find($id);
        $task->progress="done";
        $task->save();
        return redirect('home');
    }
    public function team($id)
    {
        $tasks=Task::select('tasks.*','projects.title','teams.name','users.email','teams.id')
            ->join('users','tasks.member_id','users.id')
            ->join('projects','projects.id','tasks.project_id')
            ->join('teams','projects.team_id','teams.id')
            ->where('teams.id',$id)
            ->where('tasks.progress','pending')
            ->orwhere('tasks.progress','ongoing')->get();
        return view('leader.tasks',compact('tasks'));
    }
    public function feedback(Request $request,$id)
    {
        $task=Task::find($id);
        $task->progress="ongoing";
        $task->comment=$request->comment;
        $task->save();
        return redirect('home');
    }
}
