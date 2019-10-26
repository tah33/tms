@extends('layouts.app')
@section('content')
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
                    <a href="{{url('members',$team->id)}}"><i class="fa fa-users"></i> View Members</a></li>
            </ul>
@stop
            <center><a href="{{url('add-members',$team->id)}}" class="btn btn-success"></i>Add New Member</a></center>
            <div class="row">
                <div class="box">
                    <div class="box-body">
                        <table class="table table-hover table-bordered" width="100%">
                            <thead>
                            <tr>
                                <th style="text-align: center">No.</th>
                                <th style="text-align: center">Name</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody align="center">
                            @foreach ($team->users->except(Auth::id()) as $key => $user)
                                <tr>
                                    <td style="text-align: center">{{ $key+1 }}</td>
                                    <td style="text-align: center">{{ $user->email }}</td>
                                    <td style="text-align: center">
                                            <a href="{{url('users',$user->id)}}" class="btn btn-success"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{url('delete-member',$user->id)}}"
                                               onclick="return confirm('Are you sure you want to delete?')"
                                               class="btn btn-danger remove"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
       <script>
           $(document).ready(function () {
               $('remove').on('click', 'td.warning input', function () {
                   Swal.fire({
                           title: "are u sure?",
                           text: "lorem lorem lorem",
                           type: "error",
                           showCancelButton: true,
                           confirmButtonClass: 'btn-danger waves-effect waves-light',
                           confirmButtonText: "Delete",
                           cancelButtonText: "Cancel",
                           closeOnConfirm: true,
                           closeOnCancel: true
                       },
                       function (isConfirm) {
                           if (isConfirm) {
                               swal("Deleted!", "Your imaginary file has been deleted!", "success");
                           } else {
                               swal("Cancelled", "Your imaginary file is safe :)", "error");
                           }
                       });
               });
           });
            </script>
@stop
