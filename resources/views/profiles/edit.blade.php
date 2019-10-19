@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('profiles', Auth::user()->id)}}" enctype="multipart/form-data" xmlns="http://www.w3.org/1999/html">
        @csrf
        @method('put')
        <table class="table">
            <caption>{{$user->name}}'s Profile</caption>
            <tr>
                <td>Image</td>
                <td><input class="form-control " name="image" type="file"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input class="form-control " type="text" name="name" value="{{ $user->name }}"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input class="form-control " type="text" name="email" value="{{ $user->email }}"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input class="form-control " type="text" name="username" value="{{ $user->username }}"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-success" style="margin-top:10px">Update Profile</button>
        <a class="btn btn-warning" style="margin-top:10px" href="{{url('users',Auth::id())}}">Cancel</a>
    </form>
@endsection
