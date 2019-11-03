@extends('layouts.app')
@section('content')
@section('sidebar')
    <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>Member</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{url('add-members',$team->id)}}"><i class="fa fa-user-plus"></i> Add Member</a></li>
                <li>
                    <a href="{{url('team-members',$team->id)}}"><i class="fa fa-users"></i> View Members</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('team-task',$team->id)}}"><i class="fa fa-users"></i> View Tasks</a></li>
        </li>
    </ul>
    <!-- /.col -->
@stop
<style>
    .alert {
        background: slategray;
        color: #fff;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>
@if(in_array('partial done',$progresslist))
    @if(!empty($msg))
        <div class="alert alert-success"> {{ $msg }} <a href="{{'approve'}}">Click Here to approve</a></div>
    @endif
@endif
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{count($team->users)-1}}</h3>
                    <p>Total Members</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{url('member_list',$team->id)}}" class="small-box-footer">More info <i
                        class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{count($team->projects)}}</h3>
                    <p>Total Projects</p>
                </div>
                <div class="icon">
                    <img src="{{asset('public/project.svg')}}" width="70px" height="70px">
                </div>
                <a href="{{url('team_projects',$team->id)}}" class="small-box-footer">More info <i
                        class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>@if($team->incomplete(0)) 1 @else 0 @endif</h3>
                    <p>Ongoing Projects</p>
                </div>
                <div class="icon">
                    <img src="{{asset('public/incomplete.svg')}}" width="70px" height="70px">
                </div>
                <a href="{{url('incomplete/'.$team->id)}}" class="small-box-footer">More info <i
                        class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>
    </div>
    @if(!empty($project))
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Ongoing Project</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">Title</th>
                        <th style="text-align: center">Rerements</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    <tr>
                        <td style="text-align: center">{{ $project->title }}</td>
                        <td style="text-align: center">{{ $project->requirements }}</td>
                        <td style="text-align: center">{{ $project->status == 0 ? "Ongoing" : "Done"}}</td>
                        <td style="text-align: center"><a href="{{url('projects',$project->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                            @if($project->status != 1 || empty($project->status))
                                @if (array_unique($progresslist) === array("done"))
                                <a href="{{url('status',$project->id)}}"
                                   class="btn btn-primary"
                                   onclick="return confirm('Are You Sure! You want to Submit?')">Submit</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(count($project->tasks) > 0 && $project->tasks()->exists())
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Task Lists for {{$project->title}}</caption>
                    <thead>

                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">name</th>
                        <th style="text-align: center">Module</th>
                        <th style="text-align: center">File</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">


                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $task->user->email }}</td>
                            <td style="text-align: center">{{ $task->module }}</td>
                            <td style="text-align: center"><a class="try" href="{{url('task_view',$task->id)}}"
                                                              target="_blank">{{ $task->file }}</a>
                                @if ($key == 0)
                                <div class="confarmmessage">
                                    <a href="{{url('task_view',$task->id)}}"
                                       target="_blank">Download </a>
                                </div>
                            @endif</td>
                            <td><a href="{{url('tasks',$task->id)}}" class="btn btn-primary"><i
                                        class="fa fa-eye"></i></a><a href="{{url('tasks/'.$task->id.'/edit')}}"
                                                                     class="btn btn-warning"><i
                                        class="fa fa-pencil"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$tasks->links()}}
            </div>
        </div>
    @endif
</div>
@endif
@push('script-file')
    <style>
        .confarmmessage{
            width:100%;
            background:black;
            text-align: center;
        }
    </style>
    <script>
        $(document).ready(function(){
            $(".confarmmessage").hide("");
            $(".try").click(function(e){
                e.preventDefault();
                $(".confarmmessage").toggle("");

            });
        });
    </script>
@endpush
@stop
