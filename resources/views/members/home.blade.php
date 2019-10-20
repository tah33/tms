@extends('layouts.app')
@section('content')
    <center>
        @if(empty($team))
            <h5>Till Now You Are Not A Part of Any Team</h5>
        @else
        <div class="box-body">
            <u><h1>Part of Team <font color="green">{{$team->name}}</font></h1></u>
            <div class="card-body">
                <table>
                    <h5 class="card-title">
                        <tr>
                            <td>Team Name</td>
                            <td> :</td>
                            <td> {{$team->name}}</td>
                        </tr>
                    </h5>
                    @if(!empty($project))
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
                <div class="box">
                    <div class="box-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th style="text-align: center">Module Name</th>
                                <th style="text-align: center">Progress</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: center">{{ $task->module }}</td>
                                <td style="text-align: center">{{ $task->progress ==0 ?'Onoing':'Done' }}</td>
                                <td style="text-align: center"><a
                                        href="{{url('task-files',$task->id)}}">{{ $task->file }}</a></td>
                                <td style="text-align: center">@if($task->progress !=  1 && empty($task->progress))
                                        <a href="{{url('progress',$task->id)}}" onclick="return confirm('Are You sure You want to submit')" class="btn btn-success">Submit</a>
                                    @endif
                                </td>
                            </tr>
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
