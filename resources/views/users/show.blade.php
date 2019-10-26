@extends('layouts.app')
@if(Auth::user()->hasRole('member'))
@section('sidebar')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>Member</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('add-members',$user->teams()->first()->id)}}"><i class="fa fa-user-plus"></i> Add Member</a></li>
                <li>
                    <a href="{{url('users')}}"><i class="fa fa-users"></i> View Members</a></li>
            </ul>
            @stop
            @endif
@section('content')
    <center>
    <div class="card" style="width: 18rem;">
        @if($user->image =='')
            <img class="card-img-top" width="100%" src="{{asset('public/images/avatar.png')}}" class="img-circle">
        @else
            <img class="card-img-top" width="100%" src="{{asset('public/images/'.$user->image)}}" class="img-circle">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$user->name}} Profile</h5>
        </div>
            <style>
                .ul{
                   width: 300px;
                    margin-left: -60px;
                }
            </style>
        <ul class="list-group list-group-flush ul">
            <li class="list-group-item">Name : {{$user->name}}</li>
            <li class="list-group-item">Email : {{$user->email}}</li>
            <li class="list-group-item">UserName : {{$user->username}}</li>
            <li class="list-group-item">Role : {{ $user->roles->first()->rolename}}</li>
        </ul>
            @if(!Auth::user()->hasRole('member'))
        <div class="card-body">
            <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-primary">Edit Profile</a>
        </div>
                @endif
    </div>
    </center>
@endsection
