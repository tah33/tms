@extends('layouts.app')
@section('content')
    <center><a href="{{url('teams/create')}}" class="btn btn-success"></i>Add New team</a></center><br>
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">TeamName</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($teams as $key => $team)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $team->name }}</td>
                            <td style="text-align: center">
                                @can('update',App\Team::class)
                                    <a href="{{url('teams',$team->id)}}" class="btn btn-success"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{url('teams/'.$team->id.'/edit')}}"
                                                                         class="btn btn-warning"><i
                                            class="fa fa-pencil"></i></a>
                                @endcan
                                @can('delete',App\Team::class)
                                  {{--  @if($team->projects()->exists() && $team->projects->status == 0)--}}
                                        <a href="{{url('delete-teams',$team->id)}}"
                                           onclick="return confirm(' Are you sure you want to delete?')"
                                           class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                  {{--  @else
                                        <a href="{{url('delete-teams',$team->id)}}"
                                           onclick="return confirm('Are you sure you want to delete?')"
                                           class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    @endif--}}
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
