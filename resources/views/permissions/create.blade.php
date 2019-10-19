@extends('layouts.app')
@section('content')
    <h3>Give Permission To {{$role->rolename}}</h3>
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Action</th>
                    <th>User</th>
                    <th>Project</th>
                    <th>Team</th>
                </tr>
                <form action="{{url('save-permissions',$role->id)}}" method='post'>
                    @csrf
                    <tr>
                        <td>Create</td>
                        @foreach($creates as $create)
                            <td><input type="checkbox" name="id[]" value="{{$create->id}}">{{$create->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>View</td>
                        @foreach($views as $view)
                            <td><input type="checkbox" name="id[]" value="{{$view->id}}">{{$view->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Edit</td>
                        @foreach($edits as $edit)
                            <td><input type="checkbox" name="id[]" value="{{$edit->id}}">{{$edit->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Delete</td>
                        @foreach($deletes as $delete)
                            <td><input type="checkbox" name="id[]" value="{{$delete->id}}">{{$delete->name}}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td></td><td></td>
                        <td><button type="submit" class="btn btn-success">Save</button></td>
                    </tr>
                </form>
            </table>
        </div></div>
@endsection
