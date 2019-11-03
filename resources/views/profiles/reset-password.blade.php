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
                <li><a href="{{url('add-members',Auth::user()->teams->first()->id)}}"><i class="fa fa-user-plus"></i> Add Member</a></li>
                <li>
                    <a href="{{url('team-members',Auth::user()->teams->first()->id)}}"><i class="fa fa-users"></i> View Members</a></li>
            </ul>
        </li>
        <li>
            <a href="{{url('team-task',Auth::user()->teams->first()->id)}}"><i class="fa fa-users"></i> View Tasks</a></li>
        </li>
    </ul>
    <!-- /.col -->
@stop
@endif
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Update Password</h3>
            </div>
            <div class="box-body">
                <form method="post" action="{{url('change-password',Auth::id())}}">
                    @csrf
<div class="form-group">
    <input  type="password" class="form-control" name="old" placeholder="Old Password...">
    @error('old')
    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
    @enderror
    <font color="red">{{Session::get('error')}}</font>
</div>
<div class="form-group">
    <input id="password" type="password"
           class="form-control @error('password') is-invalid @enderror"
           name="password" placeholder="Change Password">
    @error('password')
    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
    @enderror
</div>
<div class="form-group">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password...">
</div>
    <button type="submit" class="btn btn-success" style="margin-top:10px">Update</button>
    <a class="btn btn-warning" style="margin-top:10px" href="{{url('home')}}">Cancel</a>
</form>
</div>
</div>
</div>
@stop
