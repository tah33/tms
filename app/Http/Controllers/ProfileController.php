<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Team;
use App\Task;
use App\Project;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use Carbon;
use DB;
use function foo\func;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user=User::find($id);
        return view('profiles.show',compact('user'));
    }
    public function edit($id)
    {
        $user=User::find($id);
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
            'email'=>'required|unique:users,email,'.$id,
            'password' => 'nullable|confirmed|min:6',
            'old' => 'required_with:password',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        if ($request->image) {
            $file=$request->File('image');
            $ext=$file->getClientOriginalExtension();
            $filename=$user->username . '.' . $ext;
            if($user->image)
                unlink('images/'.$user->image);
            $file->move('images/',$filename);
            $user->image=$filename;
        }
        if($request->password){
            $password=$request->old;
            if (Hash::check($request->old, $user->password)) {
                $user->password = bcrypt($request->password);
            }
            else
                return redirect()->back()->with("error","your current password does not match with the password you provided. please try again.");
        }
        $user->save();
        return redirect('home');
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
        $user=User::all();
        $users=User::whereMonth('created_at', Carbon\Carbon::now()->month)->get()
        ->except(Auth::user()->id);
        $teams=Team::all()->count();
        $projects=Project::all();
        $incomplete=Project::where('status','Not Done')->get()->count();
        $activities=Activity::with('user')->paginate(15);
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
            $team = Team::whereHas('users', function ($user) {
                $user->where('email', Auth::user()->email);
            })->first();
            $tasks=Task::where('project_id',$team->incomplete(0))->paginate(15);
            if ($team->leader_id == Auth::id()) {
                return view('leader.home', compact('team','tasks'))
                    ->with('msg', 'You Need to approve some tasks');
            }
                return view('members.home', compact('project', 'team', 'project_tasks'));
        }
    }

}
