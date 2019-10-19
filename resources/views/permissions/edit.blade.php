@extends('layouts.app')
@section('content')
<h3>Change Permission of {{$roles->rolename}}</h3>
  <div class="box">
<div class="box-body">
<table class="table table-bordered table-hover">
<tr>
  <th>Action</th>
  <th>User</th>
  <th>Project</th>
  <th>Team</th>
</tr>
<form action="{{url('permissions',$roles->id)}}" method='post'>
  @csrf
  @method('put')
<tr>
  <td>Create</td>
    <td><input type="checkbox" name="id[]" value="1" @if (in_array(1, $list))
        {{'checked'}} @endif>create_user</td>
    <td><input type="checkbox" name="id[]" value="2" @if (in_array(2, $list))
        		{{'checked'}} @endif>create_project</td>
    <td><input type="checkbox" name="id[]" value="3" @if (in_array(3, $list))
    	{{'checked'}} @endif>create_team</td>
</tr>
<tr>
  <td>View</td>
    <td><input type="checkbox" name="id[]" value="4" @if (in_array(4, $list))
  		{{'checked'}} @endif>view_user</td>
    <td><input type="checkbox" name="id[]" value="5" @if (in_array(5, $list))
        			{{'checked'}} @endif>view_team</td>
    <td><input type="checkbox" name="id[]" value="6" @if (in_array(6, $list))
      			{{'checked'}} @endif>view_project</td>
</tr>
<tr>
  <td>Edit</td>
        <td><input type="checkbox" name="id[]" value="7" @if (in_array(7, $list))
                        {{'checked'}} @endif>edit_user</td>
        <td><input type="checkbox" name="id[]" value="8" @if (in_array(8, $list))
        		{{'checked'}} @endif>edit_project</td>
        <td><input type="checkbox" name="id[]" value="9" @if (in_array(9, $list))
     		{{'checked'}} @endif>edit_team</td>
</tr>
<tr>
  <td>Delete</td>
    <td><input type="checkbox" name="id[]" value="10" @if (in_array(10, $list))
   			{{'checked'}} @endif>delete_user</td>
    <td><input type="checkbox" name="id[]" value="11" @if (in_array(11, $list))
      		{{'checked'}} @endif>delete_project</td>
    <td><input type="checkbox" name="id[]" value="12" @if (in_array(12, $list))
      		{{'checked'}} @endif>delete_team</td>
</tr>
<tr>
  <td></td><td></td>
  <td><button type="submit" class="btn btn-success">Save</button></td>
</tr>
</form>
</table>
</div></div>
@endsection
