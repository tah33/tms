@extends('layouts.app')
@section('content')
<center>
<div class="col-md-6">
<div class="box box-danger">
				<form class="login100-form validate-form" method='post' action="{{url('roles',$user->id)}}">@csrf
					@method('put')
					
            <div class="box-header">
              <h3 class="box-title">Assign/Change Role</h3>
            </div>
 <div class="box-body">
					 

                            <div class="form-group">
                                <input id="name" type="text"  name="name" value="{{$user->name}}" readonly class="form-control @error('name') is-invalid @enderror"/>
                            </div>
                
                      
                            <div class="form-group">
                                <input id="name" type="text"  name="username" value="{{$user->username}}" readonly class="form-control @error('name') is-invalid @enderror"/>
                            </div>
                    
                
                            <div class="form-group">
                                <input id="name" type="text"  name="email" value="{{$user->email}}" readonly class="form-control @error('name') is-invalid @enderror">
                            </div>
                    
                            <div class="form-group">
                            <select name="id" class="form-control @error('name') is-invalid @enderror">
                            	@if($user->roles()->exists())
                            	<option value="{{$user->roles->first()->rolename}}">{{$user->roles->first()->rolename}}</option>
                            	<option>Select Another Role</option>
                                @foreach ($roles as $key => $role)
                            	<option value="{{$role->id}}">{{$role->rolename}}</option>
                            	@endforeach 
                            		@else
							     <option>Select Role</option>
                            	@foreach ($roles as $key => $role)
                            		<option value="{{$role->id}}">{{$role->rolename}}</option>
                            	@endforeach 
                            	 @endif
                            </select>
                        </div>
                        
						
					<div class="form-group">
						<button class="btn btn-primary">
							Save
						</button>
					</div>
                </div>
				</form>
			</div>
	</div></center>
@endsection