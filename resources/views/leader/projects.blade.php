 @extends('layouts.app')
 @section('content')
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
                            <th style="text-align: center">Action</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($team->projects as $key => $project)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $team->name }}</td>
                            <td style="text-align: center">{{ $project->title }}</td>
                            <td style="text-align: center">{{ $project->requirements }}</td>
                            <td style="text-align: center">{{ $project->status == 0 ?"Incomplete" :"Done" }}</td>
                              <td><a href="{{url('projects',$project->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                  @if($project->tasks()->exists())
                                  <a href="{{url('task_list',$project->id)}}" class="btn btn-info">Assigned Tasks</a>
                              @endif
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div></div>
@endsection
