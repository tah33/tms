<?php

namespace App\Policies;

use App\User;
use App\Team;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
class TeamPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any teams.
     *
     * @param  \App\User  $user
     * @return mixed
     */
   /* public function __construct()
    {
        $role=Role::find(Auth::user()->id);
        if($role->permissions()->exists())
        {
        foreach ($role->permissions as $key => $permission)
            $list[]=$permission->name;
        }
    }*/
    public function viewAny()
    {
        $user=Auth::user()->roles;
        $users=$user->first()->name;
        $role=Role::where('name',$users)->first();
        if($role->permissions()->exists())
        {
            foreach ($role->permissions as $key => $permission) {
                $list[]=$permission->name;
            }
            return in_array('team_view', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can view the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function view()
    {
        $user=Auth::user()->roles;
        $users=$user->first()->name;
        $role=Role::where('name',$users)->first();
        if($role->permissions()->exists())
        {
            foreach ($role->permissions as $key => $permission) {
                $list[]=$permission->name;
            }
            return in_array('team_view', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can create teams.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        $user=Auth::user()->roles;
        $users=$user->first()->name;
        $role=Role::where('name',$users)->first();
        if($role->permissions()->exists())
        {
            foreach ($role->permissions as $key => $permission) {
                $list[]=$permission->name;
            }
            return in_array('team_create', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can update the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function update()
    {
        $user=Auth::user()->roles;
        $users=$user->first()->name;
        $role=Role::where('name',$users)->first();
        if($role->permissions()->exists())
        {
            foreach ($role->permissions as $key => $permission) {
                $list[]=$permission->name;
            }
            return in_array('team_edit', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can delete the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function delete()
    {
        $user=Auth::user()->roles;
        $users=$user->first()->name;
        $role=Role::where('name',$users)->first();
        if($role->permissions()->exists())
        {
            foreach ($role->permissions as $key => $permission) {
                $list[]=$permission->name;
            }
            return in_array('team_delete', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can restore the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function restore(User $user, Team $team)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the team.
     *
     * @param  \App\User  $user
     * @param  \App\Team  $team
     * @return mixed
     */
    public function forceDelete(User $user, Team $team)
    {
        //
    }
}
