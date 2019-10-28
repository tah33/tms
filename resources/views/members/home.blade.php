@extends('layouts.app')
@section('content')
    <center>
        @if(empty($team))
            <h3>Till Now You Are Not A Part of Any Team</h3>
        @else
        <div class="box-body">
            <u><h3>Part of Team <font color="green">{{$team->name}}</font></h3></u>
            <div class="card-body">
                <table>
                    <h5 class="card-title">
                        <tr>
                            <td>Team Name</td>
                            <td> :</td>
                            <td> {{$team->name}}</td>
                        </tr>
                    </h5>
                    @if(($team->projects()->exists()))
                        <h5 class="card-title">
                            <tr>
                                <td>Project Title</td>
                                <td> :</td>
                                <td> {{$project->title}}</td>
                            </tr>
                        </h5>
                        <h5 class="card-title">
                            <tr>
                                <td>Project Status</td>
                                <td> :</td>
                                <td> {{$project->status == 0 ? "Ongoing" : "Done"}}</td>
                            </tr>
                        </h5>
                        @else
                        <tr><font color="red">Your Team Doesnt Have Any Project</font></tr>
                    @endif
                </table>

            </div>
        </div>
        @if(!empty($project))
        @if(($project->tasks()->exists()))
            <div class="row">
                <div class="box box-danger">
                    <div class="box-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center">Serial</th>
                                <th style="text-align: center">Module Name</th>
                                <th style="text-align: center">Module Requirements</th>
                                <th style="text-align: center">Progress</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->tasks as $key=> $task)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $task->module }}</td>
                                <td style="text-align: center">{{ $task->description }}</td>
                                <td style="text-align: center">{{ $task->progressname}}</td>
                                <td style="text-align: center">@if($task->file)
                                        {{ $task->file }}<a href="{{url('task_download',$task->id)}}"
                                                            class="btn btn-success"><i
                                                class="fa fa-download"></i></a>
                                        <a href="{{url('task_view',$task->id)}}" class="btn btn-primary"><i
                                                class="fa fa-eye" target="_blank"></i></a></td>@endif</td>
                                @if($task->progress == "pending")
                                <td><a href="{{url('pending',$task->id)}}" onclick="return confirm('Are You sure You want to start your work')" class="btn btn-success">Start</a></td>
                                    @endif
                                @if($task->progress == "ongoing")
                                    <td><a href="{{url('ongoing',$task->id)}}" onclick="return confirm('Are You sure You want to submit your work')" class="btn btn-primary">Submit</a></td>
                                @endif
                                @if($task->progress == "partial done")
                                    <td>Wait for your leader confirmation</td>
                                    @endif
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @else
                <font color="#32cd32"> <h5>You dont Have any Task</h5></font>
    </center>
    @endif
@endif
    @endif
@endsection
