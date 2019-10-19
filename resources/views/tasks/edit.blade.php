@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Task') }}</div>

                    <div class="card-body">
                        <form class="login100-form validate-form" method='post' action="{{url('tasks',$task->id)}}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('MemberName') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('member_name') is-invalid @enderror" name="member_name" value="{{ $task->member_name }}"  autocomplete="member_name" autofocus>

                                    @error('member_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="module" class="col-md-4 col-form-label text-md-right">{{ __('Module') }}</label>

                                <div class="col-md-6">
                                    <input id="module" type="text" class="form-control @error('module') is-invalid @enderror" name="module" value="{{ $task->module }}"  autocomplete="module" autofocus>

                                    @error('module')
                                    <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
<div class="form-group row">
                                <label for="module" class="col-md-4 col-form-label text-md-right">{{ __('Module') }}</label>
<div class="col-md-6 ">
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">


            </div>
        </div>
            @error('file')
            <span class="invalid-feedback" role="alert">
                                        <strong><font color="red">{{ $message }}</font></strong>
                                    </span>
            @enderror
           <br><br>


                            <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
