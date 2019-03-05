@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Bucket List </h5>
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
                            <form role="form" method="POST" action="{{ url('leads/assign') }}" id="assign-leads-form">
                                @csrf   
                                    <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover " id="dataTables-bucket-list">
                                                <thead>
                                                    <tr>                                                      
                                                        <th>Author</th>
                                                        <th>Book Title</th>
                                                        <th>Publisher</th>            
                                                        <th style="width:10%">Home Phone</th> 
                                                        <th style="width:10%">Office Phone</th>    
                                                        <th style="width:10%">Status</th>
                                                        <th style="width:5%">State</th>
                                                        <th style="width:10%">Researcher</th>                                                                                           
                                                    </tr>
                                                </thead>
                                               
                                                <tfoot>
                                                    <tr>                                                          
                                                        <th>Author</th>
                                                        <th>Book Title</th>
                                                        <th>Publisher</th>            
                                                        <th style="width:10%">Home Phone</th> 
                                                        <th style="width:10%">Office Phone</th>    
                                                        <th style="width:10%">Status</th>
                                                        <th style="width:5%">State</th>
                                                        <th style="width:10%">Researcher</th>  
                                                       
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="row">
                                                @if(auth()->user()->hasRole(['lead.researcher']))
                                                    <div class="col-sm-12">
                                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#assign-modal"> Assign</button>
                                                        <br>
                                                    </div> 
                                                 @endif   
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
        </div>
           
     
    </div>
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {
        
            $('#advance-field').hide();
            $('#advance-field-two').hide();
            $('#advance-field-three').hide();
            $('.advance-filter').on('click',function(){
                $('.filter-section').toggle(1000);
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

           var table = $('#dataTables-bucket-list').DataTable({   
            processing: true,   
            serverSide: true,
            ajax: '{{ url('leads/bucket-lists-data') }}',  
            orderCellsTop: true,
            fixedHeader: true,      
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
                        { data: 'full_name', name: 'full_name'},
                        { data: 'book_title', name: 'getBookInformation.book_title'},
                        { data: 'publisher', name: 'getBookInformation.getPublisher.name'},
                        { data: 'home_phone', name: 'home_phone'},
                        { data: 'office_phone', name: 'office_phone'},
                        { data: 'status', name: 'getStatus.name'},
                        { data: 'state', name: 'state'},
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
            // Setup - add a text input to each footer cell
            $('#dataTables-bucket-list thead tr').clone(false).appendTo( '#dataTables-bucket-list thead' );
            $('#dataTables-bucket-list thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" style="width:100%;font-size:10px;" placeholder="Search '+title+'" />' );
        
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

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
                    var isAdvanceChecked = $('#advance:checked').val()?true:false;

                    $("#dataTables-bucket-list input:checkbox:checked").map(function(){
                        leads.push($(this).val());
                    });
                    var form = this;
                    var tleads = $('#dataTables-bucket-list').DataTable();

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
         
   } );
    </script>
@endsection
