<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Auth;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all()->except(1);
        return view('permissions.index',compact('roles'));
    }
    public function create($id)
    {
        $role=Role::find($id);
        //dd($role->permissions()->exists());
        $creates=Permission::where('name', 'like', '%' . 'create' . '%')->get();
        $views=Permission::where('name', 'like', '%' . 'view' . '%')->get();
        $edits=Permission::where('name', 'like', '%' . 'edit' . '%')->get();
        $deletes=Permission::where('name', 'like', '%' . 'delete' . '%')->get();
        return view('permissions.create',compact('role','creates','views','deletes','edits'));
    }
    public function store(Request $request,$id)
    {
        $role=Role::find($id);
        $role->permissions()->attach($request->id);
        return redirect('permissions');
    }
    public function show(Permission $permission)
    {}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles=Role::with('permissions')->find($id);
        foreach($roles->permissions as $role)
        {
            $list[]=$role->id;
        }
        return view('permissions.edit',compact('roles','list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role=Role::find($id);
        $role->permissions()->sync($request->id);
        return redirect('permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
