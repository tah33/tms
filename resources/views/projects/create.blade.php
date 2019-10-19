@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Assign Project</h3>
            </div>
            <div class="box-body">
                <form method="post" action="{{url('save-projects',$team->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                               placeholder="Project Title" value="{{ old('title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                 <textarea placeholder="Project Description" id="requirements"
                           class="form-control @error('requirements') is-invalid @enderror"
                           name="requirements" value="{{ old('requirements') }}"></textarea>
                        @error('requirements')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="date" name="submission_date"
                               class="form-control @error('submission_date') is-invalid @enderror">
                        @error('submission_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                        @enderror
                    </div>
                    <br>
                    <div class="col-lg-12 input-group control-group increment">
                        <input type="file" name="filenames[]" class="form-control @error('file') is-invalid @enderror"
                               multiple accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add
                            </button>
                        </div>

                    </div>
                    @error('file')
                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                    @enderror
                    <div class="clone hide">
                        <div class="col-md-12 control-group input-group" style="margin-top:10px">
                            <input type="file" name="filenames[]"
                                   class="form-control @error('file') is-invalid @enderror" multiple accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                            <div class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>
                                    Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
