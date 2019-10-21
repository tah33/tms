@extends('layouts.app')
@section('sidebar')
    <br>
    <li><a href="{{url('team_details',$team->id)}}"><i style="font-size:15px" class="material-icons"><i
                    style="font-size:15px" class="fa fa-check"></i></i><span>Projects</span></a>
    </li>
@endsection
@section('content')
    <style>
        .alert{
            background :slategray;
            color:#fff;
            padding:20px;
            margin-bottom: 20px;
        }
    </style>
    @if(in_array('partial done',$progress))
        @if(!empty($msg))
            <div class="alert alert-success"> {{ $msg }} <a href="{{'approve'}}">Click Here to approve</a></div>
        @endif
    @endif
    <center>
        <div class="box-body">
            <u><h3>Leader of Team <font color="green">{{$team->name}}</font></h3></u>
        </div>
    </center>
    @if(!empty($project))
        <center>
            <div class="row">
                <div class="box box-info" style="width:700px;">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" style="width:600px;">
                            <caption>Project Details for {{$project->title}}</caption>
                            <thead>
                            <tr>
                                <th style="text-align: center">Project Title</th>
                                <th style="text-align: center">Requirements</th>
                                <th style="text-align: center">Submission Date</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="text-align: center">{{ $project->title }}</td>
                                <td style="text-align: center">{{ $project->requirements }}</td>
                                <td style="text-align: center">{{$project->submission_date}}</td>
                                <td style="text-align: center">{{$project->status == 0 ? "Pending" : "Done"}}</td>
                                <td style="text-align: center"><a href="{{url('projects',$project->id)}}"
                                                    class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    @if($project->status != 1 || empty($project->status))
                                        @if (array_unique($progress) === array("done")) {
                                        <a href="{{url('status',$project->id)}}"
                                           class="btn btn-primary"
                                           onclick="return confirm('Are You Sure! You want to Submit?')">Submit</a>
                                </td>
                                @endif
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </center>
    @endif
        <center>
            <div class="row">
                <div class="box box-warning" style="width:700px;">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" style="width:600px;">
                            <caption>Team Members for {{$team->name}}</caption>
                            <thead>
                            <tr>
                                <th style="text-align: center">Serial</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($team->users->except(Auth::id()) as $key=> $user)
                                <tr>
                                    <td style="text-align: center">{{ $key+1 }}</td>
                                    <td style="text-align: center">{{ $user->name }}</td>
                                    <td style="text-align: center">{{ $user->email }}</td>
                                    <td style="text-align: center">{{--<a href="{{url('members',$user->id)}}" class="btn btn-success"><i
                                    class="fa fa-eye"></i></a><a href="{{url('members/'.$user->id.'/edit')}}"
                                                                 class="btn btn-warning"><i
                                    class="fa fa-pencil"></i></a>--}}
                                        @if( $project && $project->status == 0)
                                            <a href="{{url('add-task',$user->id)}}"
                                               class="btn btn-primary">Distribute Task</a>
                                        @endif
                                        <a href="{{url('delete-member',$user->id)}}"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="btn btn-danger"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <center><a href="{{url('add-members',$team->id)}}" class="btn btn-primary">Add Members</a>
                        </center>
                    </div>
                </div>
            </div>
        </center>
    @if(!empty($tasks))
        <center>
            <div class="row">
                <div class="box box-danger" style="width:700px;">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" style="width:600px;">
                            <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">User Email</th>
                                <th style="text-align: center">Module Name</th>
                                <th style="text-align: center">Module Requirements</th>
                                <th style="text-align: center">Progress</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody align="center">
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <td style="text-align: center">{{ $key+1 }}</td>
                                    <td style="text-align: center">{{ $task->email }}</td>
                                    <td style="text-align: center">{{ $task->module }}</td>
                                    <td style="text-align: center">{{ $task->description }}</td>
                                    <td style="text-align: center">{{ $task->progressname }}</td>
                                    <td style="text-align: center">@if($task->file)
                                            {{ $task->file }}<a href="{{url('task_download',$task->id)}}"
                                                                class="btn btn-success"><i
                                                    class="fa fa-download"></i></a>
                                            <a href="{{url('task_view',$task->id)}}" class="btn btn-primary"><i
                                                    class="fa fa-eye" target="_blank"></i></a></td>@endif
                                    <td style="text-align: center"><a
                                            href="{{url('tasks/'.$task->id.'/edit')}}"
                                            class="btn btn-warning"><i
                                                class="fa fa-pencil"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </center>
    @endif
@endsection

