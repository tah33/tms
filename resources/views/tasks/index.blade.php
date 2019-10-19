@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Member Name</th>
                        <th style="text-align: center">Module Name</th>
                        <th style="text-align: center">File</th>
                        <th style="text-align: center">Progress</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $task->member_name }}</td>
                            <td style="text-align: center">{{ $task->module }}</td>
                            <td style="text-align: center"><a href="{{url('task-files',$task->id)}}">{{ $task->file }}</a></td>
                            <td style="text-align: center">{{ $task->progress }}</td>

                            <td style="text-align: center"><a href="{{url('tasks',$task->id)}}" class="btn btn-success"><i
                                        class="fa fa-eye"></i></a><a href="{{url('tasks',$task->id.'/edit')}}"
                                                                     class="btn btn-warning"><i
                                        class="fa fa-pencil"></i></a><a href="{{url('delete-task',$task->id)}}"
                                                                        onclick="return confirm('Are you sure you want to delete?')"
                                                                        class="btn btn-danger"><i
                                        class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
