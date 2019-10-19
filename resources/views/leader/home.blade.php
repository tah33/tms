@extends('layouts.app')
@section('sidebar')
    <br>
    <li><a href="{{url('projects')}}"><i style="font-size:15px" class="material-icons">assignment_turned_in</i><span>Projects</span></a>
    </li>
@endsection
@section('content')
    <center>
        <div class="box-body">
                <u><h1>Leader of Team <font color="green">{{$team->name}}</font></h1></u>
        </div>
    </center>@if(!empty($project))
    <div class="row">
        <div class="box box-info">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Project Details for {{$project->title}}</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">Project Title</th>
                        <th style="text-align: center">Requirements</th>
                        <th style="text-align: center">Submission Date</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Files</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="text-align: center">{{ $project->title }}</td>
                        <td style="text-align: center">{{ $project->requirements }}</td>
                        <td style="text-align: center">{{$project->submission_date}}</td>
                        <td style="text-align: center">{{$project->status == 0 ? "Ongoing" : "Done"}}</td>
                            <td style="text-align: center">@if($project->files()->exists())
                                @foreach($project->files as $key=> $file)
                                    {{$key+1}} . <a href="{{url('file_download',$file->id)}}">{{$file->filename}}</a>
                                    <br>
                                @endforeach
                                @else
                                                               No files Are Added
                                @endif
                            </td>@if($project->status != 1 || empty($project->status))
                            <td style="text-align: center">
                                <a href="{{url('status',$project->id)}}"
                                   class="btn btn-primary"
                                   onclick="return confirm('Are You Sure! You want to Submit?')">Submit</a>
                            </td>
                            @else
                                     <td style="text-align: center">Already Submitted</td>
                            @endif
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="box box-info">
            <div class="box-body">
                <table class="table table-hover table-bordered">
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
                    @foreach($team->users as $key=> $user)
                    <tr>
                        <td style="text-align: center">{{ $key+1 }}</td>
                        <td style="text-align: center">{{ $user->name }}</td>
                        <td style="text-align: center">{{ $user->email }}</td>
                        @if(!in_array($user->id,$tasklist))  <td style="text-align: center">

                                <a href="{{url('add-task',$user->id)}}"
                                   class="btn btn-primary">Distribute Task</a>
                            </td> @endif
                    </tr>
                        @endforeach
                    </tbody>
                </table>
              <center><a href="{{url('add-members',$team->id)}}" class="btn btn-primary">Add Members</a></center>
            </div>

        </div>

    </div>

@endsection

