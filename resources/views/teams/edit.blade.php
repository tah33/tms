@extends('layouts.app')
@section('content')
<div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Edit Team Details</h3>
            </div>
            <div class="box-body">
				<form class="login100-form validate-form" method='post' action="{{url('teams',$team->teams_id)}}">
					@csrf
                    @method('put')

                            <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $team->name }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>

						<button type="submit" class="btn btn-primary">
                                    {{ __('Upate') }}
                                </button>
						</div>
				</form>
			</div>
</div>
@endsection
