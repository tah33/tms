@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-header">{{ __('Distribute Task') }}</div>
        <form method="post" action="{{url('save-task',$project->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 input-group control-group">
                <select name="member_name" id="member_name" class="form-control @error('member_name') is-invalid @enderror" value="{{ old('member_name') }}">
                    <option value="">Select Member</option>
                    @foreach($members as $member)
                        <option value="{{$member->name}}">{{$member->name}}</option>
                        @endforeach
                </select>
                @error('member_name')
                <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                @enderror
            </div>
            <br>

            <div class="col-md-6 input-group control-group">
                <input type="text" name="module" class="form-control @error('module') is-invalid @enderror" placeholder="Module Title" value="{{ old('module') }}">
                @error('module')
                <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                @enderror
            </div>
            <br>

            <div class="col-md-6 input-group control-group">
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">


            </div>
            @error('file')
            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
            @enderror
           <br><br>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    </body>
    </html>
@endsection
