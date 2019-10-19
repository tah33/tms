@extends('layouts.app')
@section('content')
<center>
    <u><h1>Project Details for <font color="green">{{$project->title}}</font></h1></u>
  <div class="box-body">
    <table>
    <h5 class="card-title">	<tr><td>Name</td><td> : </td><td> {{$project->title}}</td></tr></h5>
    <h5 class="card-title"> <tr><td>Project Handled By</td><td> : </td><td> {{$project->team->name}}</td></tr></h5>
    <h5 class="card-title"> <tr><td>Requirements</td><td> : </td><td> {{$project->requirements}}</td></tr></h5>
    <h5 class="card-title"> <tr><td>Status</td><td> : </td><td> {{$project->status == 0 ? "Ongoing" : "Complete" }}</td></tr></h5>
    </table>
  </div>
</center>
@if($project->files()->exists())
    <div class="row">
        <div class="box box-info">
            <div class="box-body">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th style="text-align: center">Serial</th>
                <th style="text-align: center">File</th>
            </tr>
            </thead>
            <tbody>
            @foreach($project->files as $key=> $file)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td style="text-align: center"> <a href="{{url('file_download',$file->id)}}">{{$file->filename}}</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
@endif

@endsection
