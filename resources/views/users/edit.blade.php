@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{$user->name}}'s Profile</h3>
            </div>
            <div class="box-body">
                <form  method='post' action="{{url('users',$user->id)}}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name}}"  autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username}}"  autocomplete="username" >

                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}"  autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong ><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Change Password....">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">

                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>

                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection
