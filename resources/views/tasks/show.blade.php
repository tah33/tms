@extends('layouts.app')
@section('content')
    <center>
        <u><h3>Module Details for <font color="green">{{$task->module}}</font></h3></u>
        <div class="box-body">
            <table>
                <h5 class="card-title">
                    <tr>
                        <td>Module Handled By</td>
                        <td> :</td>
                        <td><a href="{{url('users',$task->u_id)}}">{{$task->email}}</a></td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Project</td>
                        <td> :</td>
                        <td><a href="{{url('projects',$task->p_id)}}">{{$task->title}}</a></td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Project Handled By</td>
                        <td> :</td>
                        <td><a href="{{url('teams',$task->t_id)}}">{{$task->name}}</a></td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Requirements</td>
                        <td> :</td>
                        <td> {{$task->description}}</td>
                    </tr>
                </h5>
                <h5 class="card-title">
                    <tr>
                        <td>Submission Date</td>
                        <td> :</td>
                        <td> {{$task->submit}}</td>
                    </tr>
                </h5>
            </table>
        </div>
    </center>
    @if(!empty($task->file))
        <center>
            <div class="row">
                <div class="box box-info" style="width:400px;">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" style="width:300px;">
                            <caption>Files for {{$task->module}}</caption>
                            <thead>
                            <tr>
                                <th style="text-align: center">File</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align: center">{{$task->file}}</td>
                                    <td style="text-align: center"><a
                                            href="{{url('task_download',$task->id)}}" class="btn btn-success"><i class="fa fa-download"></i></a><a
                                            href="{{url('task_view',$task->id)}}" class="btn btn-primary" target="_blank"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </center>
    @endif
@endsection
