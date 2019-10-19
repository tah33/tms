@extends('layouts.app')
@section('content')
    <center>
        <div class="box-body">
            <u><h1>Team Details for <font color="green">{{$team->name}}</font></h1></u>
            <div class="card-body">
                <table>
                    <h5 class="card-title">
                        <tr>
                            @if($team->leader_id != '')
                                <td>Leader Name</td>
                                <td> :</td>
                                <td> {{$team->users->first()->name}}</td>
                            @endif
                        </tr>
                    </h5>
                </table>
            </div>
          <div class="row">
                <div class="box">
                    <div class="box-body">
                        @if($team->users()->exists())
                            <table class="table table-hover table-bordered">
                                <caption>Team Members</caption>
                                <thead>
                                <tr>
                                    <th style="text-align: center">Serial</th>
                                    <th style="text-align: center">Name</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($team->users as $key => $user)
                                    <tr>
                                        <td style="text-align: center">{{$key+1}}</td>
                                        <td style="text-align: center">{{ $user->name }}</td>
                                        <td style="text-align: center">{{ $user->email }}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-danger"
                                               href="{{url('delete-member',$user->id)}}" onclick="return confirm('Are you sure you want to delete?')"><i
                                                    class="fa fa-trash"></i></a>
                                            @if( $user->id != $team->leader_id)
                                                <a href="{{url('leader',$user->id)}}" class="btn btn-success" onclick="return confirm('Are you sure you want to make him leader?')">Make Leader</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table> @endif
                    </div>
                    <a href="{{url('add-members',$team->id)}}" class="btn btn-primary">Add Members</a>
                    @if($project == "" || $project->status == 1)
                    <a href="{{url('add-projects',$team->id)}}" class="btn btn-primary">Assign Project</a>
                        @endif
                </div>
            </div>
           {{--            {{dd($project->status)}}--}}{{--
            --}}{{--<br><br> <a href="{{url('add-members',$team->id)}}" class="btn btn-primary">Add Members</a>--}}{{--
            <br><br>
            @can('create',App\Project::class)
                @if($project == "" || $project->status == 1)

                    <a href="{{url('add-projects',$team->teams_id)}}" class="btn btn-primary">Assign Project</a>

                @endif
            @endcan
        </div>--}}
    </center>
@endsection
