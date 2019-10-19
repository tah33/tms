<?php

namespace App\Policies;

use App\User;
use App\Project;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any projects.
     *
     * @param  \App\User  $user
     * @return mixed
     */
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
            return in_array('project_view', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can view the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
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
            return in_array('project_view', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can create projects.
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
            return in_array('project_create', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can update the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
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
            return in_array('project_edit', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
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
            return in_array('project_delete', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can restore the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function restore(User $user, Project $project)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the project.
     *
     * @param  \App\User  $user
     * @param  \App\Project  $project
     * @return mixed
     */
    public function forceDelete(User $user, Project $project)
    {
        //
    }
}
