@extends('layouts.app')
@section('content')
<form action="{{url('members',$team->id)}}" method="post" accept-charset="utf-8">
	@csrf
    @method('put')
					<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Select Member/s') }}</label>
                        <div class="col-md-6">
                            @foreach($teamlist as $member)
                            <input type="checkbox" name="name" class="flat-red" value="{{$member->name}}" 
                            >{{$member->name}}<br>
                            @endforeach
                             @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror

                        </div>
                    </div>
                    
<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection