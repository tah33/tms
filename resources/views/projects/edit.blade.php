@extends('layouts.app')
@section('content')

    <form action="{{ url('projects', $project->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Update Project Info</h3>
                </div>
                <div class="box-body">
                    <form method='post' action="{{url('projects',$project->id)}}">
                        @csrf
                        <div class="form-group">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                   name="title" value="{{ $project->title }}" autocomplete="name" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <textarea placeholder="Project Requirements" id="requirements" onKeyPress class="form-control"
                                          class="form-control @error('requirements') is-invalid @enderror"
                                          name="requirements" autocomplete=requirements>{{ $project->requirements }}</textarea>
                            @error('requirements')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="date" name="submission_date" value="{{ $project->submission_date }}"
                                   class="form-control @error('submission_date') is-invalid @enderror">
                            @error('submission_date')
                            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-lg-12 input-group control-group increment">
                            <input type="file" name="filenames[]"
                                   class="form-control @error('file') is-invalid @enderror" multiple accept="application/pdf,application/msword,
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
                                    <button class="btn btn-danger" type="button"><i
                                            class="glyphicon glyphicon-remove"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br><br>

                        <table class="table table-bordered table-hover">
                        @foreach($project->files as $file)
                            <tr>
                                <td>File</td>
                                <td><a href="{{ url('file_download', $file->id) }}">{{ $file->filename }}</a></td>
                                <td>
                                    <a href="{{ url('file_delete', $file->id) }}" class="btn btn-danger btn-sm">Delete
                                        File</a>
                                </td>
                            </tr>
                            @endforeach
                            </table>

                            <button type="submit" class="btn btn-success" style="margin-top:10px">Update</button>
                            <a class="btn btn-warning" style="margin-top:10px" href="{{url('projects')}}">Cancel</a>
                    </form>
    </div>
    </div>
        </div>
@endsection

