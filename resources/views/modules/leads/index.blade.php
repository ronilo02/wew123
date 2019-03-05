@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">            
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="margin-top:10px;">Leads</h5>                         
                            <div class="ibox-tools">                            
                                {{-- <button class="advance-filter btn btn-primary dim btn-xs" >
                                <i class="fa fa-filter"></i> Advance Filter                                      
                                </button>                            --}}
                                <button type="button" class="btn btn-sm btn-primary advance-filter"> <i class="fa fa-filter"></i> </button>
                                <button type="button" class="btn btn-sm btn-primary" id="refresh"> <i class="fa fa-refresh"></i></button>
                                <button type="button" class="btn btn-sm btn-primary"> <i class="fa fa-cogs"></i> </button>
                            {{-- <input type="hidden" id="filter_status"  value="{{ $filter_status['status'] }}"> --}}
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
                                        <button class="btn btn-success" id="submit-filter" type="submit"><i class="fa fa-filter"></i> Filter</button>                                   
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
                                                {{-- @if(auth()->user()->hasRole(['administrator','lead.researcher']))
                                                <th></th>
                                                @endif                                     --}}
                                            </tr>
                                        </thead>
                                        {{-- <tbody >
                                        @foreach($leads as $lead)
                                            <tr>
                                            <td ><div class="i-checks assign-check"><label><input type="checkbox"  name="leads[]"  value="{{ $lead->id }}"/></label></div></td> 
                                            <td ><a href="{{ url('leads/'.$lead->id.'/profile') }}" style="color:#1ab394;">{{ $lead->fullname() }} </a></td>
                                            <td>{{ $lead->getBookInformation['book_title'] }}</td>
                                            <td>{{ $lead->getBookInformation->getPublisher->name == null? " ":$lead->getBookInformation->getPublisher->name }}</td>
                                            <td>{{ $lead->getBookInformation['genre'] }}</td>
                                            <td>{{ $lead->getStatus->name }}</td>
                                            <td>{{ $lead->getAssignee == null ? "" : $lead->getAssignee->fullname() }}</td>
                                            <td>{{ $lead->getResearcher->fullname() }}</td>
                                            @if($view_edit_icon)
                                                <td ><a href="{{ url('leads/'.$lead->id.'/edit') }}" style="cursor:pointer;" target="_blank"><i class="fa fa-pencil" style="color:#1ab394"></i></a></td>
                                            @endif
                                            </tr>
                                        @endforeach    
                                        </tbody> --}}
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
                                                {{-- @if($view_edit_icon)
                                                <th></th>
                                                @endif --}}
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="row">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#assign-modal"> Assign</button>
                                            <br>
                                        </div> 
                                        <div class="modal inmodal" id="assign-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                            <div class="modal-content animated bounceInRight">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <i class="fa fa-share-square-o modal-icon" style="color:#1ab394"></i>
                                                        <h4 class="modal-title">Assign Leads</h4>
                                                        <small class="font-bold">You can also transfer leads using this module, just check advance settings below.</small>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row form_assign">
                                                            <div class="form-group" id="advance-field">
                                                                    <label>Select Bucket</label>
                                                                    <select name="advance_bucket" id="advance_bucket" class="form-control">
                                                                        <option value="0">Select Bucket</option>
                                                                        @foreach($users as $key => $val)
                                                                        <option value="{{ $key }}">{{ $val }}</option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                            <div class="form-group" id="advance-field-two">
                                                                    <label>Select Status</label>
                                                                <select name="advance_status" id="advance_status" class="form-control">                               
                                                                    <option value="0">All Status</option>
                                                                    @foreach($status as $key => $val)
                                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="advance-field-three">
                                                                    <label>Input Number of Leads</label>
                                                               <input type="number" class="form-control" name="advance_number_leads" value="0" placeholder="Number of Leads" id="advance_number_leads">
                                                             </div>
                                                             <div class="form-group">
                                                                    <label>Select Assignee</label>
                                                                <select name="advance_assigned_to" id="advance_assigned_to" class="form-control">
                                                                    <option value="0">Assigned to</option>
                                                                    @foreach($users as $key => $val)
                                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                                    @endforeach
                                                                </select>
                                                             </div>       
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="row">
                                                            <div class="col-sm-2"> 
                                                             </div>  
                                                            <div class="col-sm-8"> <div class="i-checks pull-left" >                                                                        
                                                                    <input type="checkbox" style="font-size:10px;" name="advance" class="advance" id="advance" value="0" ><span style="color:#1ab394;margin-left:5px;"> Show Advanced Fields </span>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2"> 
                                                            </div>  
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-2"> 
                                                            </div>
                                                            <div class="col-sm-8">   
                                                                <br>
                                                                    <button class="btn btn-primary " type="button" id="assign-submit">Assign</button>
                                                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            </div>
                                                            <div class="col-sm-2"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                @if(\Request::is('leads'))
                    var url = '{{ url('leads/getdata') }}';
                 
                @elseif(\Request::is('leads/filter'))
                    var data = [];
                    data = [{status: $('#filter_status').val()}];
                    var url = "{{ url('leads/getfilterdata') }}"+"/"+data;
                  
                @endif
                
                // $('.form_assign').hide();
                $('.filter-section').hide();                         
                $('#advance-field').hide();
                $('#advance-field-two').hide();
                $('#advance-field-three').hide();
                $('.advance-filter').on('click',function(){
                    $('.filter-section').toggle(1000);
                });

                $('#refresh').on('click',function() {
                    window.location.replace("{{ url('/leads') }}");
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

                $('.dataTables-leads').DataTable({
                    onSuccess: function (result) {
                        // execute some code after table records loaded
                    },
                    onError: function (result) {
                        // execute some code on network or other general error 
                    },
                    onDataLoad: function(result) {
                        // execute some code on ajax data load
                    },
                    retrieve: true,
                    processing: true,   
                    serverSide: true,
                    ajax: url,                  
                    pageLength: 10,
                    responsive: true,
                    ordering: false,
                    drawCallback: function() {
                        $('input[type="checkbox"]').iCheck({
                            checkboxClass: 'icheckbox_square-green'
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
                    },                         
                    columns: [       
                        { data: 'checkbox'},               
                        { data: 'full_name', name: 'full_name'},
                        { data: 'book_title', name: 'getBookInformation.book_title'},
                        { data: 'publisher', name: 'getBookInformation.getPublisher.name'},
                        { data: 'genre', name: 'getBookInformation.genre'},
                        { data: 'status', name: 'getStatus.name'},
                        { data: 'assignee', name: 'assignee'},
                        { data: 'researcher', name: 'researcher'}
                    ],  
                    columnDefs: [{
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true,
                            'selectCallback': function(nodes, selected) {
                                $('input[type="checkbox"]', nodes).iCheck('update');
                            },
                            'selectAllCallback': function(nodes, selected, indeterminate) {
                                $('input[type="checkbox"]', nodes).iCheck('update');
                            }
                        }
                    }],
                    select: 'multi',
                });

                $("#assign-submit").on('click',function(){
                    var advance = $("#advance").val();
                    var leads  = [];
                    var advance_bucket = $("#advance_bucket option:selected").val();
                    var advance_status = $("#advance_status option:selected").val();
                    var advance_number_leads = $("#advance_number_leads").val();
                    var advance_assign_to = $("#advance_assigned_to option:selected").val();
                    var isAdvanceChecked = $('#advance:checked').val()?true:false;

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
                             
                            // if(advance_number_leads != 0){
                                    if(advance_assign_to != 0 || isAdvanceChecked){
                                            $("#assign-leads-form").submit();
                                    }else{
                                        swal({
                                            title : "Field Required!",
                                            text  : "You should select assignee!"
                                        });
                                    }
                                // }else{
                                //     swal({
                                //             title : "Field Required!",
                                //             text  : "You should enter number of leads to be transfer!"
                                //         });
                                // }
                            
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

