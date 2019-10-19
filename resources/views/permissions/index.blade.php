@extends('layouts.app')
@section('content')
<div class="row">
 <div class="box">
<div class="box-body">
               <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center">No.</th>
                          <th style="text-align: center">Name</th>
                          <th style="text-align: center">Given Permissions</th>
                          <th style="text-align: center">Action</th>
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($roles as $key => $role)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $role->rolename }}</td>

                            <td style="text-align: center">@if($role->permissions()->exists())
                              @foreach($role->permissions as $key => $permission){{$key+1}}.{{ $permission->permissionname }}<br>@endforeach
                            @endif</td>

                            <td style="text-align: center">@if($role->permissions()->exists())
                              <a href="{{url('permissions',$role->id.'/edit')}}" class="btn btn-primary">Change Permissions</a>
                                @else
                                    <a href="{{url('add-permissions',$role->id)}}" class="btn btn-success">Give Permissions</a>
                            @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection
