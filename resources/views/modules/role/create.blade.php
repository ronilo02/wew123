@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
         @if(isset($roledata))
             <form role="form" action="{{ url('role/'.$roledata->id) }}" method="POST">
             <input type="hidden" name="_method" value="PUT">
         @else
             <form role="form" action="{{ route('role.store') }}" method="POST">
         @endif
             @csrf
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter New Role </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                           
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 ">                                   
                                    <div class="form-group"><label>Name</label> <input type="text" name="name" value="@if(isset($roledata)) {{ $roledata->name }} @endif" placeholder="Enter Name" class="form-control" required></div>
                                    <div class="form-group"><label>Display Name</label> <input type="text" name="display_name" value="@if(isset($roledata)) {{ $roledata->display_name }} @endif" placeholder="Enter Display Name" class="form-control" required> </div>
                                    <div class="form-group"><label>Description</label> <input type="text" name="description" value="@if(isset($roledata)) {{ $roledata->description }} @endif" placeholder="Enter Description" class="form-control" required></div>
                                    <div>
                                    <button class="ladda-button btn btn-primary pull-right" data-style="slide-right">Save</button>                               
                                    </div>                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Assign Permissions</h5>
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
                        <table class="table table-striped table-bordered table-hover dataTables-roles" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" id="check-all" value=""></label></div></th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                       @php
                                            $checked = '';
                                       @endphp 

                                       @if(count($permission->getRoles) > 0)
                                            @foreach($permission->getRoles as $roles)
                                                @if(isset($roledata))
                                                    @if($roles->role_id == $roledata->id)
                                                        @php
                                                             $checked = 'checked';
                                                        @endphp
                                                    @endif
                                                @endif
                                            @endforeach

                                        <div class="i-checks"><label> <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $checked }}></label></div>
                                       @else
                                       <div class="i-checks"><label> <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></label></div>
                                       @endif 
                                    </td>
                                    <td style="color:#1ab394;">{{ $permission->display_name }}</td>
                                    <td>{{ $permission->description }}</td>
                                </tr>
                             @endforeach   
                             
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" id="check-all" value=""></label></div></th>
                                    <th>Display Name</th>
                                    <th>Description</th>                                    
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>                
            </div>
            </form>
       </div>
    </div>
@endsection

@section('custom_js')
<script>
        $(document).ready(function(){
            $("#check-all").on("ifUnchecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("uncheck");
            });

            $("#check-all").on("ifChecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("check");
            });

        });
    </script>
@endsection