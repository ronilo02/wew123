@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">            
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="margin-top:10px;">Leads</h5>                         
                            <div class="ibox-tools">                            
                                <button class="advance-filter btn btn-primary dim btn-xs" >
                                <i class="fa fa-filter"></i> Advance Filter                                      
                                </button>                           
                            </div>
                        </div>
                        <div class="ibox-content">
                        <div class="filter-section">
                        <br>
                        <div class="row">
                                <form action="{{ url('leads/filter') }}" method="POST" role="form" id="filter-form">
                                @csrf
                                    <div class="col-sm-5">
                                    <select name="status" id="status" class="form-control">                               
                                        <option value="0">Select Status</option>
                                        @foreach($status as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                    <select name="assigned_to" id="assigned_to" class="form-control">
                                        <option value="0">Assigned to</option>
                                        @foreach($users as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-info dim pull-right"  type="button"><i class="fa fa-refresh"></i></button> 
                                        <button class="btn btn-primary dim pull-right" type="button"><i class="fa fa-bars"></i></button>                            
                                        <button class="btn btn-success dim pull-right" id="submit-filter" type="submit"><i class="fa fa-filter"></i> Filter</button>    
                                        
                                    </div>  
                                </form>
                            </div>
                            <br>
                            <div class="hr-line-dashed"></div>
                            <br>
                            </div>
                        <form role="form" method="POST" action="{{ url('leads/assign') }}" id="assign-leads-form">
                            @csrf    
                            <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-leads">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Author</th>
                                                <th>Book Title</th>
                                                <th>Publisher</th>                                   
                                                <th>Genre</th>
                                                <th>Status</th>
                                                <th>Assigned</th>
                                                <th>Researcher</th>
                                                @if(auth()->user()->hasRole(['administrator','lead.researcher']))
                                                <th></th>
                                                @endif                                    
                                            </tr>
                                        </thead>
                                        <tbody >
                                        @foreach($leads as $lead)
                                            <tr>
                                            <td ><div class="i-checks assign-check"><label><input type="checkbox"  name="leads[]"  value="{{ $lead->id }}"/></label></div></td> 
                                            <td ><a href="{{ url('leads/'.$lead->id.'/profile') }}" style="color:#1ab394;">{{ $lead->fullname() }} </a></td>
                                            <td>{{ $lead->getBookInformation->book_title }}</td>
                                            <td>{{ $lead->getBookInformation->getPublisher == null? " ":$lead->getBookInformation->getPublisher['name']}}</td>
                                            <td>{{ $lead->getBookInformation->genre }}</td>
                                            <td>{{ $lead->getStatus->name }}</td>
                                            <td>{{ $lead->getAssignee == null ? "" : $lead->getAssignee->fullname() }}</td>
                                            <td>{{ $lead->getResearcher->fullname() }}</td>
                                            @if(auth()->user()->hasRole(['administrator','lead.researcher']))
                                                <td ><a href="{{ url('leads/'.$lead->id.'/edit') }}" style="cursor:pointer;" target="_blank"><i class="fa fa-pencil" style="color:#1ab394"></i></a></td>
                                            @endif
                                            </tr>
                                        @endforeach    
                                        </tbody>
                                        <tfoot>
                                            <tr>   
                                                <th></th>                               
                                                <th>Author</th>
                                                <th>Book Title</th>
                                                <th>Publisher</th>                                    
                                                <th>Genre</th>
                                                <th>Status</th>
                                                <th>Assigned</th>
                                                <th>Researcher</th>
                                                @if(auth()->user()->hasRole(['administrator','lead.researcher']))
                                                <th></th>
                                                @endif
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary btn-block" id="assign-show"> Assign</button>
                                            <br>
                                        </div> 
                                </div>
                                <div class="form_assign">
                                <div class="row">     
                                        <div class="col-sm-12">
                                                <div class="i-checks pull-right" ><input type="checkbox"  name="advance" class="advance" id="advance" value="0" > Show Advanced Fields</div>
                                        </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="row form_assign">
                                    <div class="col-sm-2" id="advance-field">
                                            <select name="advance_bucket" id="advance_bucket" class="form-control">
                                                <option value="0">Select Bucket</option>
                                                @foreach($users as $key => $val)
                                                <option value="{{ $key }}">{{ $val }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-sm-3" id="advance-field-two">
                                        <select name="advance_status" id="advance_status" class="form-control">                               
                                            <option value="0">All Status</option>
                                            @foreach($status as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-3" id="advance-field-three">
                                       <input type="number" class="form-control" name="advance_number_leads" value="0" placeholder="Number of Leads" id="advance_number_leads">
                                     </div>
                                     <div class="col-sm-2">
                                        <select name="advance_assigned_to" id="advance_assigned_to" class="form-control">
                                            <option value="0">Assigned to</option>
                                            @foreach($users as $key => $val)
                                            <option value="{{ $key }}">{{ $val }}</option>
                                            @endforeach
                                        </select>
                                     </div>
                                     <div class="col-sm-2">
                                            <button class="btn btn-success btn-block" type="button" id="assign-submit">Assign</button>
                                     </div>

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
            </div>           
    </div>

@endsection

@section('custom_js')
    <script>
           $(document).ready(function(){
  
                 $('.form_assign').hide();
                $('.filter-section').hide();
                $('#advance-field').hide();
                $('#advance-field-two').hide();
                $('#advance-field-three').hide();
                $('.advance-filter').on('click',function(){
                    $('.filter-section').toggle(1000);
                });

                $('#assign-show').on('click',function(e){
                    $('.form_assign').toggle(1000);
                });

                
               $("#advance").on("ifUnchecked",function(e){
                   e.preventDefault();
                 //uncheck all checkboxes
                 $(this).val(0);
                 $('#advance-field').hide(1000);
                 $('#advance-field-two').hide(1000);
                 $('#advance-field-three').hide(1000);
                });

                $("#advance").on("ifChecked",function(e){
                    e.preventDefault();
                    //uncheck all checkboxes
                    $(this).val(1);
                    $('#advance-field').show(1000);
                    $('#advance-field-two').show(1000);
                    $('#advance-field-three').show(1000);
                });

                $("#advance_status").on('change',function(){
                    var advance_status = $("#advance_status option:selected").val();
                    
                    if(advance_status != 0){
                        $('#advance-field-three').show(1000);
                    }else{
                        $('#advance-field-three').hide(1000);
                    }
                });

                $("#assign-submit").on('click',function(){
                    var advance = $("#advance").val();
                    var leads  = [];
                    var advance_bucket = $("#advance_bucket option:selected").val();
                    var advance_status = $("#advance_status option:selected").val();
                    var advance_number_leads = $("#advance_number_leads").val();
                    var advance_assign_to = $("#advance_assigned_to option:selected").val();
                    $(".dataTables-leads input:checkbox:checked").map(function(){
                        leads.push($(this).val());
                    });
                    var form = this;
                    var tleads = $('.dataTables-leads').DataTable();

                    var params = tleads.$('input,select,textarea').serializeArray();

                        // Iterate over all form elements
                        $.each(params, function(){
                        // If element doesn't exist in DOM
                        if(!$.contains(document, form[this.name])){
                            // Create a hidden element
                            $(form).append(
                                $('<input>')
                                    .attr('type', 'hidden')
                                    .attr('name', this.name)
                                    .val(this.value)
                            );
                        }
                    });
                   if(advance != 0){
                         if(advance_bucket != 0){
                             
                                 if(advance_number_leads != 0){
                                    if(advance_assign_to != 0){
                                            $("#assign-leads-form").submit();
                                    }else{
                                        swal({
                                            title : "Field Required!",
                                            text  : "You should select assignee!"
                                        });
                                    }
                                }else{
                                    swal({
                                            title : "Field Required!",
                                            text  : "You should enter number of leads to be transfer!"
                                        });
                                }
                            
                         }else{
                            swal({
                                    title : "Field Required!",
                                    text  : "You should select bucket list!"
                                });
                         }  
                   }else{
                         if(advance_assign_to != 0){  
                            if(leads.length !== 0){                                                     
                                $("#assign-leads-form").submit();
                            }else{
                                swal({
                                    title : "Field Required!",
                                    text  : "You should select leads to assign!"
                                });
                            }   
                        }else{                            
                                swal({
                                    title : "Field Required!",
                                    text  : "You should select assignee!"
                                });
                        }
                   }
                });           
            });                
        
    </script>
@endsection

