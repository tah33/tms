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
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $task->username }}</td>
                            <td style="text-align: center">{{ $task->module }}</td>
                            <td style="text-align: center"><a href="{{url('task-files',$task->id)}}">{{ $task->file }}</a></td>
                            <td style="text-align: center">{{ $task->progress }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
