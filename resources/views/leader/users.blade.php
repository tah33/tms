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
    <center><a href="{{url('add-members',$team->id)}}" class="btn btn-success">Add Member</a></center>
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <caption>Users List</caption>
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">UserName</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Image</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($team->users->except(Auth::id()) as $key => $user)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->name }}</td>
                            <td style="text-align: center">{{ $user->username }}</td>
                            <td style="text-align: center">{{ $user->email }}</td>
                            <td style="text-align: center"><img src="{{asset('images/'.$user->image)}}"
                                                                class="user-image"></td>
                            <td><a href="{{url('users',$user->id)}}" class="btn btn-primary"><i
                                        class="fa fa-eye"></i></a>
                                <a href="{{url('delete-member',$user->id)}}" class="btn btn-danger sa-remove"
                                   onclick="return confirm('Are you sure you want to remove him from your team!')"><i
                                        class="fa fa-trash-o"></i></a>
                           <a href="{{url('add-task',$user->id)}}" class="btn btn-primary">Assign Task</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
          {{--  <script>
            $('.sa-remove').click(function () {
            var postId = $(this).data('id');
            swal({
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
            function(){
            window.location.href = "url('home')/" + postId;
            });
            </script>--}}
@endsection
