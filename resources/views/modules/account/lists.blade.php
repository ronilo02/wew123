@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>User Lists</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                                <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($users as $user)
                                <tr>
                                    <td><img src="{{ asset('storage/files/users/'.$user->avatar) }}" alt="" class="img-circle" width="30px" height="30px"></td>
                                    <td style="color:#1ab394;"><a href="{{ url('user/'.$user->id.'/edit') }}">{{ $user->fullname() }}</a></td>            
                                    <td>{{ $user->username }}  </td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->getRoles as $role)
                                            <label class="{{ $role->getRole->class }}">{{ $role->getRole->display_name }}</label>
                                        @endforeach
                                    </td>
                                    <td></td>
                                </tr>
                             @endforeach 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
           
       </div>
    </div>
@endsection

@section('custom_js')

@endsection