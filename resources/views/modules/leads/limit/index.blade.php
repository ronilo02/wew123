@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
     @if(isset($limit))
     <form role="form" action="{{ url('limit/'.$limit->id) }}" id="user-form" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="_method" value="PUT">
     @else 
        <form role="form" action="{{ route('limit.store') }}" id="limit-form" method="POST">
     @endif   
        @csrf
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create Limit Lead </h5>
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
                            <div class="col-sm-12 b-r">
                                    <p style="color:#1ab394;">*This limit value indicate to sales new lead counts from their bucket. If sales new lead counts is greater than the limit then the system will skip from assigning new leads to their bucket! </p>
                                    <div class="form-group"><label>Limit Value</label> <input type="text" name="limit_value" value="@if(isset($limit)){{ ucfirst($limit->limit) }}@endif" placeholder="Enter Limit Value" class="form-control" required> </div>
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>    
                            </div>
                        
                    </div>

                    </div>
                </div>
            </div>
            </div>
           
       </form>
    </div>
@endsection

@section('custom_js')
<script>
        $(document).ready(function(){
           
        });
    </script>
@endsection
