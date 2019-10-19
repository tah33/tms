<?php

namespace App\Policies;

use App\Role;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
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
            return in_array('user_view', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
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
            return in_array('user_view', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can create models.
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
        return in_array('user_create', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
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
            return in_array('user_edit', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
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
            return in_array('user_delete', $list);
        }
        else
            return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
