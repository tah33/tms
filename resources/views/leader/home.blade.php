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
                            <a href="{{url('team-members',$team->id)}}"><i class="fa fa-users"></i> View Members</a></li>
                </ul>

                <div class="box box-warning direct-chat direct-chat-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Direct Chat</h3>

                        <div class="box-tools pull-right">
                            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                    data-widget="chat-pane-toggle">
                                <i class="fa fa-comments"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- Conversations are loaded here -->
                        <div class="direct-chat-messages">
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->

                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                                <div class="direct-chat-info clearfix">
                                    <span class="direct-chat-name pull-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                </div>
                                <!-- /.direct-chat-info -->
                                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                <!-- /.direct-chat-img -->
                                <div class="direct-chat-text">
                                    You better believe it!
                                </div>
                                <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->

                            <!-- Message. Default to the left -->
                           
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!--/.direct-chat -->
                </div>
                <!-- /.col -->

                @stop
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count($team->users)-1}}</h3>
                        <p>Total Members</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{url('member_list',$team->id)}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{count($team->projects)}}</h3>
                        <p>Total Projects</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('public/project.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('team_projects',$team->id)}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>@if($team->incomplete(0)) 1 @else 0 @endif</h3>
                        <p>Ongoing Projects</p>
                    </div>
                    <div class="icon">
                        <img src="{{asset('public/incomplete.svg')}}" width="70px" height="70px">
                    </div>
                    <a href="{{url('incomplete/'.$team->id)}}" class="small-box-footer">More info <i
                            class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
        @if(count($tasks) > 0 && $tasks->first()->project()->exists())
            <div class="box">
                <div class="box-body">
                    <table class="table table-hover table-bordered">
                        <caption>Task Lists for {{$tasks->first()->project->title}}</caption>
                        <thead>

                        <tr>
                            <th style="text-align: center">No.</th>
                            <th style="text-align: center">name</th>
                            <th style="text-align: center">Module</th>
                            <th style="text-align: center">File</th>
                            <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <td style="text-align: center">{{ $key+1 }}</td>
                                <td style="text-align: center">{{ $task->user->email }}</td>
                                <td style="text-align: center">{{ $task->module }}</td>
                                <td style="text-align: center"><a href="" id="dn">{{ $task->file }}</a></td>
                                <td><a href="{{url('tasks',$task->id)}}" class="btn btn-primary"><i
                                            class="fa fa-eye"></i></a><a href="{{url('tasks/'.$task->id.'/edit')}}"
                                        class="btn btn-warning"><i
                                            class="fa fa-pencil"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$tasks->links()}}
                </div>
            </div>
        @endif
    </div>
    <script>
      $(document).ready(function () {
          $('dn').on('click', 'td.warning input', function () {
            Swal.fire({
                    title: "Wow!",
                    text: "Message!",
                    type: "success",
                    showCancelButton: true,
                    cancelButtonText: "View",
                    confirmButtonText: 'Download!',
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
