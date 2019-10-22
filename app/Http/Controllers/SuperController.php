<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
use App\Team;
use DB;
use Illuminate\Support\Facades\Auth;

class SuperController extends Controller
{
    public function userList()
    {
    	$users=User::all()->except(Auth::user()->id);
    	return view('super_admin.users',compact('users'));
    }
    public function teamList()
    {
    	$teams=Team::all();
    	return view('super_admin.teams',compact('teams'));
    }
    public function projectList()
    {
    	$projects=Project::all();
    	return view('super_admin.projects',compact('projects'));
    }
    public function incompleteList()
    {
    	$projects=Project::where('status','Not Done')->get();
    	return view('super_admin.projects',compact('projects'));
    }
}
