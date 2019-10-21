@extends('layouts.app')
@section('content')
    <center>
        <u><h3>Project Details for <font color="green">{{$project->title}}</font></h3></u>
        <div class="box-body">
            <table>
                <h5 class="card-title">
                    <tr>
                        <td>Name</td>
                        <td> :</td>
                        <td> {{$project->title}}</td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Project Handled By</td>
                        <td> :</td>
                        <td><a href="{{url('teams',$project->team->id)}}">{{$project->team->name}}</a></td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Requirements</td>
                        <td> :</td>
                        <td> {{$project->requirements}}</td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Status</td>
                        <td> :</td>
                        <td> {{$project->status == 0 ? "Ongoing" : "Complete" }}</td>
                    </tr>
                </h5>
            </table>
        </div>
    </center>
    @if($project->files()->exists())
        <center>
            <div class="row">
                <div class="box box-info" style="width:400px;">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" style="width:300px;">
                            <caption>Files for {{$project->title}}</caption>
                            <thead>
                            <tr>
                                <th style="text-align: center">Serial</th>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($project->files as $key=> $file)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td style="text-align: center">{{$file->filename}}</td>
                                    <td style="text-align: center"><a
                                            href="{{url('file_download',$file->id)}}" class="btn btn-success"><i
                                                class="fa fa-download"></i></a><a
                                            href="{{url('file_view',$file->id)}}" class="btn btn-primary"
                                            target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>@if(! Auth::user()->hasRole('member'))
            <center><a href="{{url('projects/'.$project->id.'/edit')}}" class="btn btn-primary">Edit Project Info</a>
            @endif</center>
        </center><br>
    @endif
    @if(!empty($tasks))
        <center>
            <div class="row">
                <div class="box box-primary" style="width:700px;">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" style="width:600px;">
                            <caption>Tasks Assigned for {{$project->title}}</caption>
                            <thead>
                            <tr>
                                <th style="text-align: center">Serial</th>
                                <th style="text-align: center">Task Module</th>
                                <th style="text-align: center">Username</th>
                                <th style="text-align: center">Requirement</th>
                                <th style="text-align: center">Submission Date</th>
                                <th style="text-align: center">Progress</th>
                                <th style="text-align: center">File</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $key => $task)
                                <tr>
                                    <td style="text-align: center">{{$key+1}}</td>
                                    <td style="text-align: center">{{$task->module}}</td>
                                    <td style="text-align: center">{{$task->username}}</td>
                                    <td style="text-align: center">{{$task->description}}</td>
                                    <td style="text-align: center">{{$task->submit}}</td>
                                    <td style="text-align: center">{{$task->progress}}</td>
                                    @if($task->file)
                                        <td style="text-align: center">{{$task->file}}<a
                                                href="{{url('task_download',$task->id)}}" class="btn btn-success"><i
                                                    class="fa fa-download"></i></a>
                                            <a href="{{url('task_view',$task->id)}}" class="btn btn-primary" target="_blank"><i
                                                    class="fa fa-eye"></i>
                                        </td>@endif
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
