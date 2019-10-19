<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Member;
use App\Team;
use App\Task;
use App\Project;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Carbon;
use DB;
class ProfileController extends Controller
{

    public function edit($id)
    {
        $user=User::with('roles')->find($id);
        return view('profiles.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users,username,'.$id,
            'email'=>'required|unique:users,email,'.$id
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->image) {
            $file=$request->File('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time() . '.' . $ext;
            $file->move('public/images/',$filename);
            $$user->image=$filename;
        }
        $user->save();
        return back();
    }
     public function verify(Request $request)
    {

        $email=Auth::attempt(['email' => $request->login, 'password' => $request->password]);
        $username=Auth::attempt(['username' => $request->login, 'password' => $request->password]);
        if($username || $email)
        {
            $activity=new Activity;
            $activity->user_id=Auth::id();
            $activity->login_time=date('Y-m-d H:i:s');
            $activity->save();
            return redirect('home');
        }
        else
        {
            return back()->with('msg', 'Error!Enter Cedentials Correctly');
        }

    }
    public function logout()
    {
        $user=Activity::where('user_id',Auth::id())->latest()->first();
        if($user)
        {
        $user->logout_time=date('Y-m-d H:i:s');
        $user->save();
        }
        Auth::logout();
        return redirect('/');
    }
    public function home()
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
        elseif (Auth::user()->hasRole('member'))
        {
            /*$member=DB::table('users')
                ->join('members','users.id','members.member_id')
                ->join('teams','members.team_id','teams.teams_id')
                ->leftjoin('projects','teams.teams_id','projects.team_id')
                ->leftjoin('tasks','projects.projects_id','tasks.project_id')
                ->select('teams.*','users.email','members.*','projects.*','tasks.*')
                ->where('users.id',Auth::id())
                ->orderBy('projects.projects_id','desc')
                ->orderBy('tasks.tasks_id','desc')
                ->first();*/
            $team = Team::has('projects')->whereHas('users', function ($query) {
                $query->where('username', Auth::user()->username);
            })->first();
                if(!empty($team->leader_id))
                {
                  $project=Project::where('team_id',$team->id)->latest()->first();
                    if($team->leader_id == Auth::id())
                        return view('leader.home',compact('team','project'));
                }
            return view('members.home',compact('member'));
        }
    }

}
