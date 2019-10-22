@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>@if(!empty($team)){{count($team->users)-1}} @else 0 @endif</h3>
                        <p>Total Members</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{url('member_list')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>@if($team->projects()->exists()){{count($team->projects)}} @else 0 @endif</h3>
                        <p>Total Projects</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('public/project.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('team_projects',$team->id)}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
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
                    <a href="{{url('incomplete',$team->id)}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
           {{-- <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($tasks)}}</h3>
                        <p>Total Tasks</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('public/tasks.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('task_list',$team->id)}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>--}}

        </div>
    </div>
@stop
