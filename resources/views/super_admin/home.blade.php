@extends('layouts.app')
@section('content')
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count($user)}}</h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('user_list')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$teams}}</h3>

                <p>Total Teams</p>
              </div>
              <div class="icon">
                <img src="{{asset('public/group.png')}}" width="70px" height="70px">
              </div>
              <a href="{{url('team_list')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{count($projects)}}</h3>
                <p>Total Projects</p>
              </div>
              <div class="icon">
                <img src="{{asset('public/project.svg')}}" width="70px" height="70px">
              </div>
              <a href="{{url('project_list')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$incomplete}}</h3>
                <p>Ongoing Projects</p>
              </div>
              <div class="icon">
                <img src="{{asset('public/incomplete.svg')}}" width="70px" height="70px">
              </div>
              <a href="{{url('incomplete')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
 <div class="box">
<div class="box-body">
               <table class="table table-hover table-bordered">
                <caption>Users Added In this Month</caption>
                      <thead>
                        <tr>
                          <th style="text-align: center">No.</th>
                          <th style="text-align: center">Name</th>
                          <th style="text-align: center">UserName</th>
                          <th style="text-align: center">Email</th>
                          <th style="text-align: center">Image</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($users as $key => $user)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->name }}</td>
                            <td style="text-align: center">{{ $user->username }}</td>
                            <td style="text-align: center">{{ $user->email }}</td>
                              @if($user->image)
                            <td style="text-align: center"><img src="{{asset('public/images/'.$user->image)}}" class="user-image" height="42" width="42"></td>
                         @endif </tr>
                        @endforeach

                      </tbody>
              </table>
            </div>
          </div></div>
                <div class="row">
 <div class="box box-info">
<div class="box-body">
               <table class="table table-hover table-bordered">
                <caption>Login & Logout TIme</caption>
                      <thead>
                        <tr>
                          <th style="text-align: center">No.</th>
                          <th style="text-align: center">Name</th>
                          <th style="text-align: center">Login Time</th>
                          <th style="text-align: center">Logout Time</th>
                        </tr>
                      </thead>
                   <tbody>
                           @foreach($user->activities as $key=> $activity)
                               <tr>
                                   <td style="text-align: center">{{ $key+1}}</td>
                           <td style="text-align: center">{{ $activity->user_id ? $activity->name : ""}}</td>
                           <td style="text-align: center">{{  $activity->login_time }}</td>
                           <td style="text-align: center">{{  $activity->logout_time ? $activity->logout_time : "Online"}}</td>
                               </tr>
                           @endforeach

                   </tbody>

              </table>
    {{$activities->links()}}
            </div>
          </div></div>
@endsection
