@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Add Members</h3>
            </div>
            <div class="box-body">
                <form method='post' action="{{url("save-member",$team->id)}}">
                    @csrf
                    <div class="form-group">
        <select class="form-control select2" multiple="multiple" data-placeholder="Select Member/s" name="id[]">
            @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->username}}</option>
                @endforeach
        </select>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
    </div>
    </div>
    </div>
@endsection
