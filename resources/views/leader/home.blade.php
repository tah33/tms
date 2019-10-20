@extends('layouts.app')
@section('sidebar')
    <br>
    <li><a href="{{url('team_details',$team->id)}}"><i style="font-size:15px" class="material-icons">assignment_turned_in</i><span>Projects</span></a>
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
                                        {{$key+1}} . <a
                                            href="{{url('file_download',$file->id)}}">{{$file->filename}}</a>
                                        <br>
                                    @endforeach
                                @else
                                    No files Are Added
                                @endif
                            </td>
                            @if($project->status != 1 || empty($project->status))
                                @if (array_unique($progress) === array(1)) {
                                <td style="text-align: center">
                                    <a href="{{url('status',$project->id)}}"
                                       class="btn btn-primary"
                                       onclick="return confirm('Are You Sure! You want to Submit?')">Submit</a>
                                </td>
                                    @else
                                    <td>One of the task is in Progress</td>
                                @endif
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
                <div class="box box-warning">
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
                                            @if(!in_array($user->id,$memberlist))
                                                <a href="{{url('add-task',$user->id)}}"
                                                   class="btn btn-primary">Distribute Task</a>
                                            @endif
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
   {{-- <div class="row">
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
                        @if(!in_array($user->id,$memberlist))  <td style="text-align: center">
                                <a href="{{url('add-task',$user->id)}}"
                                   class="btn btn-primary">Distribute Task</a>
                            </td> @endif
                    </tr>
                        @endforeach
                    </tbody>
                </table>
              <center><a href="{{url('add-members',$team->id)}}" class="btn btn-primary">Add Members</a></center>
            </div>
   --}}         @if(!empty($tasks))
                <div class="row">
                    <div class="box box-danger">
                        <div class="box-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center">No.</th>
                                    <th style="text-align: center">User Email</th>
                                    <th style="text-align: center">Module Name</th>
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
                                        <td style="text-align: center">{{ $task->progress == 0 ? 'Ongoing' : "Complete" }}</td>
                                        <td style="text-align: center"><a
                                                href="{{url('task-files',$task->id)}}">{{ $task->file }}</a></td>
                                        <td style="text-align: center"><a href="{{url('tasks',$task->id)}}"
                                                                          class="btn btn-success"><i
                                                    class="fa fa-eye"></i></a><a
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
    @endif
@endsection

