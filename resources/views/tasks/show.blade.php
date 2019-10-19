@extends('layouts.app')
@section('content')
    <center>
        <u><h1>Project Details for <font color="green">{{$task->project->title}}</font></h1></u>
        <div class="box-body">
        
            <table>
                <h5 class="card-title">	<tr><td>Submission Date</td><td> : </td><td> {{$task->project->submission_date}}</td></tr></h5>
                <h5 class="card-title">	<tr><td>Member Name</td><td> : </td><td> {{$task->member_name}}</td></tr></h5>
                <h5 class="card-title"> <tr><td>Module Name</td><td> : </td><td> {{$task->module}}</td></tr></h5>
                <h5 class="card-title">	<tr><td>Task Files</td><td> : </td><td> {{$task->file}}</td></tr></h5>
                <h5 class="card-title"> <tr><td>Status</td><td> : </td><td> {{$task->progress}}</td></tr></h5>


            </table>
        </div></center>
@endsection
