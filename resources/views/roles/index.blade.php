@extends('layouts.app')
@section('content')
<div class="row">
 <div class="box">
<div class="box-body">
               <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center">No.</th>
                          <th style="text-align: center">Name</th>
                          <th style="text-align: center">Action</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($users as $key => $user)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->email }}@if($user->roles()->exists())({{$user->roles->first()->rolename}})@endif</td>
                            <td style="text-align: center">@if($user->roles()->exists())
                              <a href="{{url('roles',$user->id)}}" class="btn btn-success">Change Role</a>@else
                              <a href="{{url('roles',$user->id)}}" class="btn btn-success">Assign Role</a>@endif </td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection