 @extends('layouts.app')
 @section('content')
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
                        @foreach ($users as $key => $user)
                          <tr >
                            <td style="text-align: center">{{ $key+1 }}</td>
                            <td style="text-align: center">{{ $user->name }}</td>
                            <td style="text-align: center">{{ $user->username }}</td>
                            <td style="text-align: center">{{ $user->email }}</td>
                            <td style="text-align: center"><img src="{{asset('images/'.$user->image)}}" class="user-image"></td>
                              <td><a href="{{url('users',$user->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                          </tr>
                        @endforeach
                      </tbody>
              </table>
            </div>
          </div></div>
@endsection
