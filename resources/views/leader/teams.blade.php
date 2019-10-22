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
                          <th style="text-align: center">Action</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($teams as $key => $team)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $team->name }}</td>
                              <td><a href="{{url('teams',$team->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div></div>
@endsection
