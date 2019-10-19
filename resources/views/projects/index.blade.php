@extends('layouts.app')
@section('content')
{{--<<<<<<< HEAD--}}
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Project Name</th>
                        <th style="text-align: center">Status</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($projects as $key => $project)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $project->title }}</td>
                            <td style="text-align: center">{{ $project->status == 0 ?"Ongoing":"Complete" }}</td>
                            <td style="text-align: center">
                                @can('update',App\Project::class)
                                <a href="{{url('projects',$project->id)}}"
                                                              class="btn btn-success"><i
                                        class="fa fa-eye"></i></a><a href="{{url('projects/'.$project->id.'/edit')}}"
                                                                     class="btn btn-warning"><i
                                        class="fa fa-pencil"></i></a>
                                @endcan
                                    @can('delete',App\Project::class)
                                @if($project->status == 0)
                                    <a
                                        href="{{url('delete-projects',$project->id)}}"
                                        onclick="return confirm('Project is ongoing! Are you sure you want to delete?')"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                @else
                                    <a
                                        href="{{url('delete-projects',$project->id)}}"
                                        onclick="return confirm('Are you sure you want to delete?')"
                                        class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                @endif
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
