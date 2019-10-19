<?php

namespace App\Http\Controllers;

use App\Member;
use App\Role;
use App\Team;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $team=Team::find($id);
        $users = User::doesntHave('teams')->whereHas('roles', function($role) {
            $role->where('name', 'member');
        })->get();
        return view('members.create',compact('users','team'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $team=Team::find($id);
        $team->users()->attach($request->id);
        return redirect('teams/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team=Team::find($id);
        foreach ($team->members as $key => $member)
        {
            $teamlist[]=$member;
        }
        return view('members.edit',compact('team','teamlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team=User::find($id);
        $team->teams()->detach();
        /*if($team) {
            $team->leader_id = null;
            $team->save();
        }*/
        return back();
    }
}
