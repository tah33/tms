@extends('layouts.app')
@section('content')
<div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$teams}}</h3>

                <p>Total Teams</p>
              </div>
              <div class="icon">
                <img src="{{asset('group.png')}}" width="70px" height="70px">
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
                <img src="{{asset('project.svg')}}" width="70px" height="70px">
              </div>
              <a href="{{url('project_list')}}" class="small-box-footer">More info <i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$incomplete}}</h3>

                <p>Pending Projects</p>
              </div>
              <div class="icon">
                <img src="{{asset('incomplete.svg')}}" width="70px" height="70px">
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
                <caption>Projects List</caption>
                      <thead>
                        <tr>
                          <th style="text-align: center">No.</th>
                          <th style="text-align: center">Team Name</th>
                          <th style="text-align: center">Title</th>
                          <th style="text-align: center">Requirements</th>
                          <th style="text-align: center">Status</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($projects as $key => $project)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $project->team->name }}</td>
                            <td style="text-align: center">{{ $project->title }}</td>
                            <td style="text-align: center">{{ $project->requirements }}</td>
                            <td style="text-align: center">{{ $project->status }}</td>
                          </tr>
                        @endforeach
                        
                      </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection
