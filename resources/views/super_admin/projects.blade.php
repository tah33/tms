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
                              <td><a href="{{url('projects',$project->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div></div>
@endsection
