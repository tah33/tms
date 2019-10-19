@extends('layouts.app')
@section('content')
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method='post' action="{{url('roles')}}">@csrf
					<span class="login100-form-title p-b-33">
						Create Role
					</span>

					 <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Add roles
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
@endsection