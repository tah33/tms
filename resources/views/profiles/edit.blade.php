@extends('layouts.app')
@section('content')
    <form method="post" action="{{url('profiles', Auth::user()->id)}}" enctype="multipart/form-data" xmlns="http://www.w3.org/1999/html">
        @csrf
        @method('put')
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Update Profile Info</h3>
                </div>
                <div class="box-body">
                    <form method='post' action="{{url('profiles',$user->id)}}">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $user->name }}" autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="text"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ $user->email }}" autocomplete="requirements">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror"
                                   name="username" value="{{ $user->username }}" autocomplete="requirements">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="old-password" type="password" class="form-control" name="old" placeholder="Old Password...">
                            @error('old')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        <font color="red">{{Session::get('error')}}</font>
                        </div>
                        <div class="form-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder="Change Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password...">
                        </div>
                        <div class="col-lg-12 input-group control-group increment">
                            <input type="file" name="image"
                                   class="form-control @error('image') is-invalid @enderror" accept="image/*">

                        </div>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                        <button type="submit" class="btn btn-success" style="margin-top:10px">Update</button>
                        <a class="btn btn-warning" style="margin-top:10px" href="{{url('home')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
@endsection
