@extends('layouts.app')
@section('content')
    <form action="{{url('save-member',$team->id)}}" method="post" accept-charset="utf-8">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Select Member/s') }}</label>
            <div class="col-md-6">
                @foreach($users as $key => $user)
                    <input type="checkbox" name="id[]" value="{{$user->id}}">{{$user->email}}<br>
                @endforeach
                @error('member_id')
                <span class="invalid-feedback" role="alert"><strong><font
                            color="red">{{ $message }}</font></strong></span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
