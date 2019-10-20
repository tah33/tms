@extends('layouts.app')
@section('content')
    <center>
        <div class="card" style="width: 18rem;">@if(Auth::user()->image =='')
                <img class="card-img-top" width="100%" src="{{asset('images/avatar.png')}}" class="img-circle">
            @else
                <img class="card-img-top" width="100%" src="{{asset('images/'.Auth::user()->image)}}" class="img-circle">
            @endif
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td> {{$user->name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td> {{$user->email}}</td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td> {{$user->username}}</td>
                            </tr>
                            @if($user->roles()->exists())
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td> {{$user->roles->first()->rolename}}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{url('profiles/'.$user->id.'/edit')}}" class="btn btn-info">Edit Profile</a>
    </center>
@endsection
