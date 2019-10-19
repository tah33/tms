<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use App\Role;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Validation\Rule;
class TeamController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Team::class);
        $teams=Team::all();
        return view('teams.index',compact('teams'));
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Team::class);
        return view('teams.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:teams,name',
        ]);
        $team=new Team;
        $team->name=$request->name;
        $team->save();
        return redirect('teams');
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Team::class);
        $team=Team::find($id);
        $project="";
        if($team->projects()->exists())
        {
            $project=Project::where('team_id',$team->id)->latest()->first();
        }
        return view('teams.show',compact('team','project'));

    }
    /*
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $this->authorize('update', Team::class);
        return view('teams.edit',compact('team'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            Rule::unique('teams')->ignore($id),
        ]);
        $team=Team::find($id);
        $team->name=$request->name;
        $team->save();
        return redirect('teams');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Team::class);
        $team=Team::find($id);
       // $team->project()->delete();
        $team->users()->detach();
        $team->delete();
        return back();
    }

    public function leader($id)
    {
        $leader=User::find($id);
        $team=Team::where('id',$leader->teams->first()->id)->first();
        $team->leader_id=$id;
        $team->save();
        return back();
    }
    public function team($id)
    {
        $team=Team::find($id);
        $project='';
        if($team->projects()->exists())
            $project=Project::where('team_id','$team->id')->first();
        return view('leader.team-details',compact('team','project'));
    }
}
