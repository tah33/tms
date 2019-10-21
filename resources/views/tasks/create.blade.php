@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">

                <h3 class="box-title">Assign Task</h3>

                <h3 class="box-title">Assign Project</h3>

            </div>
            <div class="box-body">
                <form method="post" action="{{url('save-task',$project->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="member_id" value="{{$user->id}}">
                        <input type="text" readonly class="form-control @error('module') is-invalid @enderror" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="module" class="form-control @error('module') is-invalid @enderror"
                               placeholder="Task Module" value="{{ old('module') }}">
                        @error('module')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Module Description" id="description" onKeyPress class="form-control"
                                  class="form-control @error('description') is-invalid @enderror"
                                  name="description" autocomplete=description></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="date" name="submit"
                               class="form-control @error('submit') is-invalid @enderror">
                        @error('submit')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 input-group control-group increment">
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>

                    @error('file')
                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                    @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
