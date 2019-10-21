<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use App\Team;
use App\Member;
use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Project::class);
        $projects = Project::all();
        return view('projects.index', compact('projects'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $this->authorize('create', Project::class);
        $team=Team::find($id);
        return view('projects.create',compact('team'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:projects,title',
            'requirements' => 'required_without:file',
            'filename' => 'required_without:requirements|unique:unique:files,filename',
            'submission_date'=>"required|date|after_or_equal:tomorrow"
        ]);
        $team=Team::find($id);
        $project = new Project();
        $project->title=$request->title;
        $project->requirements=$request->requirements;
        $project->submission_date=$request->submission_date;
        $project->status=0;
        $team->projects()->save($project);
        $data = [];
        $files = $request->filenames;
        if($files) {
            foreach ($files as $u_file) {
                $name=$u_file->getClientOriginalName();
                $u_file->move(public_path().'/files/', $name);
                $project_file = new File();
                $project_file->filename = $name;
                $project->files()->save($project_file);
            }
        }
        return redirect('projects');
    }
    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$this->authorize('view', Project::class);
        $project=Project::find($id);
        $tasks=Task::select('tasks.*','users.username')
            ->join('users','tasks.member_id','users.id')->get();
      return view('projects.show',compact('project','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Project::class);
        $project = Project::find($id);
        return view('projects.edit', compact('project'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        {
            $request->validate([
                'title' => 'required|unique:projects,title,'.$id,
                'requirements' => 'required_without:file',
                'filename' => 'required_without:requirements',
                'submission_date'=>'required|date|after_or_equal:tomorrow'
            ]);
            $project = Project::find($id);
            $project->title=$request->title;
            $project->requirements=$request->requirements;
            $project->submission_date=$request->submission_date;
            $project->save();
            $data = [];
            $files = $request->filenames;
            if($files) {
                foreach ($files as $u_file) {
                    $name=$u_file->getClientOriginalName();
//                    $u_file->move(public_path().'/images/', $name);
                    $project_file =File::where('project_id', $id)->get();
                    foreach ($files as $file) {
                        $name=$file->getClientOriginalName();
                        $file->move(public_path().'/files/', $name);
                        $path = public_path()."/files/".$name;
                        $project_fi = new File();
                        $project_fi->filename = $name;
                        $project->files()->save($project_fi);
                    }
                }
            }
            return redirect('projects');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Project::class);
        $project=Project::find($id);
        if($project->files()->exists());
            $project->files()->delete();
        if($project->tasks()->exists())
            $project->tasks()->delete();
        $project->delete();
        return back();
    }
    public function status($id)
    {
        $project=Project::find($id);
        if($project->tasks()->exists())
            $project->tasks()->delete();
        $project->status=1;
        $project->save();
        return back();
    }
}
