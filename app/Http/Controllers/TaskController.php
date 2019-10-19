<?php

namespace App\Http\Controllers;

use App\Task;
use App\Team;
use App\Project;
use App\User;
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
            $tasks = Task::all();
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
        return view('tasks.create',compact('user','team','project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'module' => 'required_without:file',
            'file' => 'required_without:module',
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
        if($request->module)
        {
            $task->module=$request->module;
        }
        $task->member_id=$request->member_id;
        $task->submit=$request->submit;
        $task->progress=0;
        $project->tasks()->save($task);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Task::find($id);
        $team=$task->project;
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Task::find($id);
        return view('tasks.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $request->validate([
           // 'member_name' => 'required|unique:tasks,member_name,'.$id,
            'module' => 'required_without:file',
            'file' => 'required_without:module'
        ]);
        $task = Task::find($id);
        $project=$task->project_id;
        $task->member_name = $request->member_name;
        $task->module = $request->module;
        if ($request->file)
        {
            $file=$request->File('file');
            $ext=$file->getClientOriginalExtension();
            $filename=time() . '.' . $ext;
            $file->move('public/members/',$filename);
            $task->image=$filename;
        }
        $task->project()->associate($project)->save();
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return back();
    }
    public function progress($id)
    {
        $task=Task::find($id);
        $task->progress="Complete";
        $task->save();
        return back();
    }
    public function download($id){
        $file = Task::find($id);
        $path = public_path() . '/members/'.$file->file;
        return response()->download($path);
    }
}