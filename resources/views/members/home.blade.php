@extends('layouts.app')
@section('content')
    <center>
        @if(empty($member))
            <h5>Till Now You Are Not A Part of Any Team</h5>
        @else
        <div class="box-body">
            <u><h1>Part of Team <font color="green">{{$member->name}}</font></h1></u>
            <div class="card-body">
                <table>
                    <h5 class="card-title">
                        <tr>
                            <td>Team Name</td>
                            <td> :</td>
                            <td> {{$member->name}}</td>
                        </tr>
                    </h5>
                    @if(!empty($member->title))
                        <h5 class="card-title">
                            <tr>
                                <td>Project Title</td>
                                <td> :</td>
                                <td> {{$member->title}}</td>
                            </tr>
                        </h5>
                        <h5 class="card-title">
                            <tr>
                                <td>Project Status</td>
                                <td> :</td>
                                <td> {{$member->status == 0 ? "Ongoing" : "Done"}}</td>
                            </tr>
                        </h5>
                        @else
                        <tr><font color="red">Your Team Doesnt Have Any Project</font></tr>
                    @endif
                </table>

            </div>
        </div>
        @if(!empty($member->module))
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
                                <td style="text-align: center">{{ $member->module }}</td>
                                <td style="text-align: center">{{ $member->progress }}</td>
                                <td style="text-align: center"><a
                                        href="{{url('task-files',$member->id)}}">{{ $member->file }}</a></td>
                                <td style="text-align: center">@if($member->progress !=  1 && empty($member->progress))
                                        <a href="{{url('progress',$member->id)}}" class="btn btn-success">Submit</a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif
    @endif
@endsection
