@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter New Permission </h5>
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
                            @if(isset($permissiondata))
                            <form role="form" action="{{ url('permission/'.$permissiondata->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @else
                            <form role="form" action="{{ route('permission.store') }}" method="POST">   
                            @endif                            
                                 @csrf
                                    <div class="form-group"><label>Name</label> <input type="text" name="name" value="@if(isset($permissiondata)) {{ $permissiondata->name }} @endif" placeholder="Enter Name" class="form-control" required></div>
                                    <div class="form-group"><label>Display Name</label> <input type="text" value="@if(isset($permissiondata)) {{ $permissiondata->display_name }} @endif" name="display_name" placeholder="Enter Display Name" class="form-control" required> </div>
                                    <div class="form-group"><label>Description</label> <input type="text" value="@if(isset($permissiondata)) {{ $permissiondata->description }} @endif" name="description" placeholder="Enter Description" class="form-control" required></div>
                                    <div>
                                    <button class="ladda-button btn btn-primary pull-right" data-style="slide-right">@if(isset($permissiondata)) Update @else Save @endif</button>                               
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Horizontal form</h5>
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
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                             @foreach($permissions as $permission)
                                <tr>
                                    <td ><a href="{{ url('permission/'.$permission->id.'/edit') }}" style="color:#1ab394;">{{ $permission->name }}</a></td>
                                    <td>{{ $permission->display_name }}</td>
                                    <td>{{ $permission->description}}</td>
                                </tr>
                             @endforeach   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    
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