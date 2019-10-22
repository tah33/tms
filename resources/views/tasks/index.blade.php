@extends('layouts.app')
@section('content')
    @if(count($tasks) > 0)
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Member Email</th>
                        <th style="text-align: center">Module Name</th>
                        <th style="text-align: center">Module Requirements</th>
                        <th style="text-align: center">Progress</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $task->user->email }}</td>
                            <td style="text-align: center">{{ $task->module }}</td>
                            <td style="text-align: center">{{ $task->description }}</td>
                            <td style="text-align: center">{{ $task->progressname}}</td>
                            <td style="text-align: center"><a href="{{url('tasks',$task->id)}}" class="btn btn-success"><i
                                        class="fa fa-eye"></i></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <h3><div class="alert">Right Now You Have no any projects</div></h3>
    @endif
@endsection
