@extends('layouts.app')
@section('content')
    @if(Auth::user()->hasRole('member'))
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
                <li><a href="{{url('add-members',$tasks->first()->t_id)}}"><i class="fa fa-user-plus"></i> Add
                        Member</a></li>
                <li>
                    <a href="{{url('team-members',$tasks->first()->t_id)}}"><i class="fa fa-users"></i> View Members</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{url('team-task',$tasks->first()->t_id)}}"><i class="fa fa-users"></i> View Tasks</a></li>
        </li>
    </ul>
    <!-- /.col -->
@stop
@endif
<div class="row">
    <div class="box">
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center">No.</th>
                    <th style="text-align: center">Team Name</th>
                    <th style="text-align: center">Project Name</th>
                    <th style="text-align: center">Member Email</th>
                    <th style="text-align: center">Module Name</th>
                    <th style="text-align: center">Module Requirements</th>
                    <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody align="center">
                @foreach ($tasks as $key => $task)
                    <tr>
                        <td style="text-align: center">{{ $key+1 }}</td>
                        <td style="text-align: center">{{ $task->name }}</td>
                        <td style="text-align: center">{{ $task->title }}</td>
                        <td style="text-align: center">{{ $task->email }}</td>
                        <td style="text-align: center">{{ $task->module }}</td>
                        <td style="text-align: center">{{ $task->description }}</td>
                        <td style="text-align: center"><a href="{{url('approved',$task->id)}}" class="btn btn-success"
                                                          onclick="return confirm('Are you sure, you want to accept this works')">Approve</a>
                            <a href="{{url('rejected',$task->id)}}" class="btn btn-danger">Reject</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
