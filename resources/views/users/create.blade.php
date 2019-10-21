@extends('layouts.app')
@section('content')
  <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Create Account</h3>
            </div>
            <div class="box-body">
                <form  method='post' action="{{url('users')}}">
					@csrf
                           <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Enter Name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>

                           <div class="form-group">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" placeholder="Username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email.....">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong ><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password....">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>

                  <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password...">
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
