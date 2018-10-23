@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
     @if(isset($userdata))
     <form role="form" action="{{ url('user/'.$userdata->id) }}" id="user-form" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="_method" value="PUT">
     @else
        <form role="form" action="{{ route('user.store') }}" id="user-form" method="POST">
     @endif   
        @csrf
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create new User </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">User Info</h3>
                                    <p style="color:#1ab394;">*User can change their info dynamically on their profile settings.</p>
                                    <div class="form-group"><label>Firstname</label> <input type="text" name="firstname" value="@if(isset($userdata)){{ ucfirst($userdata->firstname) }}@endif" placeholder="Enter Firstname" class="form-control" required> </div>
                                    <div class="form-group"><label>Lastname</label> <input type="text" name="lastname" value="@if(isset($userdata)){{ ucfirst($userdata->lastname) }}@endif" placeholder="Enter Lastname" class="form-control" required></div>
                                    <div class="form-group"><label>Primary Email</label> <input type="email" name="email" value="@if(isset($userdata)){{ $userdata->email }}@endif" placeholder="Enter Primary Email" class="form-control" required></div>
                                    <div class="form-group"><label>Profile Picture</label> <input type="file" name="profile"   class="form-control" ></div>
                            </div>
                            <div class="col-sm-6"><h4>User Credentials</h4>
                                   <p style="color:#1ab394;">*Updating credentials require to input your current password.</p>
                                    <div class="form-group"><label>Username</label> <input type="text" name="username" value="@if(isset($userdata)){{ $userdata->username }}@endif" placeholder="Enter Username" class="form-control" @if(isset($userdata))disabled @else required @endif></div>
                                    @if(isset($userdata))
                                        <div class="form-group"><label>Current Password</label> <input type="password" name="current-password" placeholder="Enter Current Password" class="form-control" ></div>
                                    @endif

                                    <div class="form-group"><label>@if(isset($userdata)) New @endif Password</label> <input type="password" name="password" placeholder="Enter @if(isset($userdata)) New @endif Password" class="form-control" required></div>
                                    <div class="form-group"><label>Confirm @if(isset($userdata)) New @endif Password</label> <input type="password" name="confirm-password" placeholder="Confirm @if(isset($userdata)) New @endif Password" class="form-control" required></div>
                                    <div>
                                    <button type="button" class="ladda-button btn btn-primary pull-right" data-style="slide-right" id="submit-user">@if(isset($userdata)) Update @else Create @endif</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            @if(auth()->user()->hasRole(['superadmin','admin']))
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"> 
                        <h5>Assign User Role</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-user-role" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" value="" id="check-all-roles"></label></div></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>

                                    @if(isset($userdata))
                                        @php
                                            $checked = '';
                                       @endphp   

                                        @foreach($userdata->getRoles as $userrole)
                                            @if($role->id ==  $userrole->role_id)
                                                @php
                                                        $checked = 'checked';
                                                @endphp   
                                            @endif
                                        @endforeach
                                    @endif    
                                       
                                        <div class="i-checks"><label> <input type="checkbox" value="{{ $role->id }}" name="roles[]" id="roles" @if(isset($userdata)){{ $checked }} @endif></label></div></td>
                                    
                                    <td style="color:#1ab394;">{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                </tr>
                    @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" value="" id="check-all-roles"></label></div></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       @endif
       </form>
    </div>
@endsection

@section('custom_js')
<script>
        $(document).ready(function(){
            $("#check-all-roles").on("ifUnchecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("uncheck");
            });

            $("#check-all-roles").on("ifChecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("check");
            });

            $("#submit-user").on("click",function(e){
                var roles = $('input[type=checkbox]');


                if(roles.filter(":checked").length == 0){
                    swal({
                        title: "Missing Inputs",
                        text: "Please assign role to user.",
                        confirmButtonColor: "#1ab394"
                    });
                }else{
                    $("#user-form").submit();
                }
            });
        });
    </script>
@endsection
