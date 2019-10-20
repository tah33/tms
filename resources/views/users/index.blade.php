@extends('layouts.app')
@section('content')
    <center><a href="{{url('users/create')}}" class="btn btn-success"></i>Add New User</a></center>
    <div class="row">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center">No.</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Role</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach ($users as $key => $user)
                        <tr>
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->email }}</td>
                            <td style="text-align: center">{{ $user->roles->first()->rolename }}</td>
                            <td style="text-align: center">
                                @can('view',App\User::class)
                                <a href="{{url('users',$user->id)}}" class="btn btn-success"><i
                                        class="fa fa-eye"></i></a>
                                @endcan
                                    @can('delete',App\User::class)
                                <a href="{{url('delete-users',$user->id)}}"
                                   onclick="return confirm('Are you sure you want to delete?')"
                                   class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        @endcan
                                    @can('update',App\User::class)
                                        <a href="{{url('users/'.$user->id.'/edit')}}"
                                           class="btn btn-warning"><i class="fa fa-pencil"></i></a>
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
