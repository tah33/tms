@extends('layouts.app')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update Tasks</h3>
            </div>
            <div class="box-body">
                        <form class="login100-form validate-form" method='post' action="{{url('tasks',$task->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <input type="hidden" name="member_id" value="{{$task->member_id}}">
                            <div class="form-group">
                                <input id="module" type="text" class="form-control @error('module') is-invalid @enderror"
                                       name="module" value="{{ $task->module }}" autocomplete=module autofocus>

                                @error('module')
                                <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="date" name="submit" value="{{ $task->submit }}"
                                       class="form-control @error('submit') is-invalid @enderror">
                                @error('submit')
                                <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-12 input-group control-group">
                                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                       accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                @enderror
                            </div>
                            @if(!empty($task->file))
                            <table class="table table-bordered table-hover">
                                    <tr>
                                        <td>File</td>
                                        <td><a
                                                href="{{url('task-files',$task->id)}}">{{ $task->file }}</a></td>
                                        <td>
                                            <a href="{{ url('delete-file',$task->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure wan to delete!')">Delete
                                                File</a>
                                        </td>
                                    </tr>
                            </table>
                            @endif
                            <button type="submit" class="btn btn-success" style="margin-top:10px">Update</button>
                            <a class="btn btn-warning" style="margin-top:10px" href="{{url('home')}}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
@endsection
