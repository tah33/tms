@extends('layouts.app')
@section('content')
    <center>
    <div class="card" style="width: 18rem;">
        @if($user->image =='')
            <img class="card-img-top" width="100%" src="{{asset('images/avatar.png')}}" class="img-circle">
        @else
            <img class="card-img-top" width="100%" src="{{asset('images/'.$user->image)}}" class="img-circle">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$user->name}} Profile</h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name : {{$user->name}}</li>
            <li class="list-group-item">Email : {{$user->email}}</li>
            <li class="list-group-item">UserName : {{$user->username}}</li>
        </ul>
        <div class="card-body">
            <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
    </center>
@endsection
