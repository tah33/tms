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
         </li>
         <li>
             <a href="{{url('team-task',$team->id)}}"><i class="fa fa-users"></i> View Tasks</a></li>
         </li>
     </ul>
     <!-- /.col -->
 @stop
             @endif
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
                              </td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div></div>
@endsection
