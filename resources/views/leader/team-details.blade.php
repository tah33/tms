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
                <li><a href="{{url('add-members',$team->id)}}"><i class="fa fa-user-plus"></i> Add Member</a></li>
                <li>
                    <a href="{{url('team-members',$team->id)}}"><i class="fa fa-users"></i> View Members</a></li>
            </ul>
            @stop
            @endif
<div class="row">
    <div class="box box-info">
        <div class="box-body">
            <table class="table table-hover table-bordered">
                <caption>Projects Handled By {{$team->name}}</caption>
                <thead>
                <tr>
                    <th style="text-align: center">Serial</th>
                    <th style="text-align: center">Project Tilte</th>
                    <th style="text-align: center">Requirements</th>
                    <th style="text-align: center">Submission Date</th>
                    <th style="text-align: center">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($team->projects as $key=> $project)
                    <tr>
                        <td style="text-align: center">{{ $key+1 }}</td>
                        <td style="text-align: center">{{ $project->title }}</td>
                        <td style="text-align: center">{{ $project->requirements }}</td>
                        <td style="text-align: center">{{ $project->submission_date }}</td>
                        <td style="text-align: center">{{ $project->status == 0 ?'Ongoing':'Complete' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
