<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">            
            <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="margin-top:10px;">Leads</h5>                         
                            <div class="ibox-tools">                            
                                
                                <button type="button" class="btn btn-sm btn-primary advance-filter"> <i class="fa fa-filter"></i> </button>
                                <button type="button" class="btn btn-sm btn-primary" id="refresh"> <i class="fa fa-refresh"></i></button>
                                <button type="button" class="btn btn-sm btn-primary"> <i class="fa fa-cogs"></i> </button>
                            
                            </div>
                           
                        </div>
                        <div class="ibox-content">
                        <div class="filter-section">
                        <br>
                        <div class="row">
                                <form action="<?php echo e(url('leads/filter')); ?>" method="POST" role="form" id="filter-form">
                                <?php echo csrf_field(); ?>
                                    <div class="col-sm-5">
                                    <select name="status" id="status" class="form-control">                               
                                        <option value="0">Select Status</option>
                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    </div>
                                    <div class="col-sm-4">
                                    <select name="assigned_to" id="assigned_to" class="form-control">
                                        <option value="0">Assigned to</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <form role="form" method="POST" action="<?php echo e(url('leads/assign')); ?>" id="assign-leads-form">
                            <?php echo csrf_field(); ?>    
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
                                                
                                            </tr>
                                        </thead>
                                        
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
                                                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group" id="advance-field-two">
                                                                    <label>Select Status</label>
                                                                <select name="advance_status" id="advance_status" class="form-control">                               
                                                                    <option value="0">All Status</option>
                                                                    <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="advance-field-three">
                                                                    <label>Input Number of Leads</label>
                                                               <input type="number" class="form-control" name="advance_number_leads" value="0" placeholder="Number of Leads" id="advance_number_leads">
                                                             </div>
                                                             <div class="form-group" id="advance-country">
                                                                    <label>Select Country</label>
                                                                    <select name="advance_country" id="advance_country" class="form-control">                               
                                                                        <option value="0">None</option>
                                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                            </div>
                                                             <div class="form-group" >
                                                                    <label>Select new status</label>
                                                                    <select name="new_advance_status" id="new_advance_status" class="form-control">                               
                                                                        <option value="0">None</option>
                                                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                            </div>
                                                            <div class="form-group" id="advance-field-four">
                                                                <label>Assign By</label>
                                                                <select name="advance_assigned_by" id="advance_assigned_by" class="form-control">
                                                                    <option value="0">Assign By</option>
                                                                    <option value="1">Branch</option>
                                                                    <option value="2">Company</option>
                                                                    <option value="3">Person</option>
                                                                </select>
                                                             </div>    
                                                             <div class="form-group" id="advance-field-five">
                                                                    <label>Company</label>
                                                                    <select name="company" id="company" class="form-control">
                                                                        <option value="0">Choose Company</option>
                                                                        <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                            </div>   
                                                            <div class="form-group" id="branch_ajax" >
                                                                   
                                                            </div>  
                                                             <div class="form-group" id="advance-field-six">
                                                                    <label>Select Assignee</label>
                                                                    <select name="advance_assigned_to" id="advance_assigned_to" class="form-control">
                                                                        <option value="0">Assigned to</option>
                                                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script>
           $(document).ready(function(){
                // <?php if(\Request::is('leads')): ?>
                //     var url = '<?php echo e(url('leads/getdata')); ?>';
                 
                // <?php elseif(\Request::is('leads/filter')): ?>
                //     var data = [];
                //     data = [{status: $('#filter_status').val()}];
                //     var url = "<?php echo e(url('leads/getfilterdata')); ?>"+"/"+data;
                  
                // <?php endif; ?>
                
                // $('.form_assign').hide();
                $('.filter-section').hide();     
                $('#advance-country').hide();                    
                $('#advance-field').hide();
                $('#advance-field-two').hide();
                $('#advance-field-three').hide();
                $('#advance-field-four').hide();
                $('#advance-field-five').hide();
                $('#branch_ajax').hide();
                $('.advance-filter').on('click',function(){
                    $('.filter-section').toggle(1000);
                });

                $('#refresh').on('click',function() {
                    window.location.replace("<?php echo e(url('/leads')); ?>");
                });

                $('#assign-show').on('click',function(e){
                    $('.form_assign').toggle(1000);
                });

                 $("#advance").on("ifUnchecked",function(e){
                    e.preventDefault();
                //uncheck all checkboxes
                    $(this).val(0);
                    $('#advance-country').hide();  
                    $('#advance-field').hide(1000);
                    $('#advance-field-two').hide(1000);
                    $('#advance-field-three').hide(1000);
                    $('#advance-field-four').hide();
                    
                    $('#advance-field-five').hide();
                    $('#branch_ajax').hide();
                    $('#advance-field-six').show();
                 
                });

                $("#advance").on("ifChecked",function(e){
                    e.preventDefault();
                    //uncheck all checkboxes
                    $(this).val(1);
                   // $('#advance-field').show(1000);
                    $('#advance-field-two').show(1000);
                    $('#advance-field-three').show(1000);
                    $('#advance-field-four').show(1000);
                    $('#advance-field-five').hide(1000);
                    $('#advance-country').show(1000);  
                   // $('#branch_ajax').show(1000);
                    //$('#advance-field-six').hide();
                }); 

                $("#company").on("change",function(){
                    var id  = $("#company").val();
                    var url = "/branch/getdata";
                     
                    $.ajax({
                            type:"POST",
                            url:url,                              
                            data:{
                            id:id,
                            _token: "<?php echo e(csrf_token()); ?>",       
                            },
                            success:function(result){
                               
                               $("#branch_ajax").html(result);
                               if($("#advance_assigned_by").val() == 1){
                                   $('#branch_ajax').show(1000);
                               }
                            },
                            error:function(error){
                                console.log(error);      
                            }
                            
                    });
            });
                
               

                $("#advance_status").on('change',function(){
                    var advance_status = $("#advance_status option:selected").val();
                    
                    if(advance_status != 0){
                        $('#advance-field-three').show(1000);
                    }else{
                        $('#advance-field-three').hide(1000);
                    }
                });

                $("#advance_assigned_by").on("change",function(){
                  
                    var val = $(this).val();

                    if(val == 1 ){
                        $('#advance-field').hide(1000);
                        $('#advance-field-five').show(1000);
                        $('#advance-field-six').hide(1000);    
                    }else if(val == 2){       
                        $('#advance-field').hide(1000);                  
                        $('#advance-field-five').show(1000);
                        $('#branch_ajax').hide(1000); 
                        $('#advance-field-six').hide(1000);                           
                    }else if(val == 3){
                        $('#advance-field').show(1000);
                        $('#advance-field-six').show(1000);    
                        $('#advance-field-five').hide(1000);
                        $('#branch_ajax').hide(1000);                    
                    }else{
                        $('#advance-field').hide(1000);
                        $('#advance-field-five').hide(1000);
                        $('#branch_ajax').hide(1000);   
                        $('#advance-field-six').hide(1000);
                    } 
                    
                });

               var table = $('.dataTables-leads').DataTable({
                    onSuccess: function (result) {
                        console.log(result);
                    },
                    onError: function (result) {
                        console.log(result);
                    },
                    onDataLoad: function(result) {
                        // execute some code on ajax data load
                    },
                    retrieve: true,
                    processing: true,   
                    serverSide: true,
                    ajax: '<?php echo e(url('/leads/getdata')); ?>',                  
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
                        $('#advance-country').hide();  
                        $('#advance-field').hide(1000);
                        $('#advance-field-two').hide(1000);
                        $('#advance-field-three').hide(1000);
                        $('#advance-field-four').hide();
                        $('#advance-field-five').hide();
                        $('#branch_ajax').hide();
                        $('#advance-field-six').show();
                        });

                        $("#advance").on("ifChecked",function(e){
                            e.preventDefault();
                            //uncheck all checkboxes
                            $(this).val(1);
                           // $('#advance-field').show(1000);
                           $('#advance-country').show(1000);  
                            $('#advance-field-two').show(1000);
                            $('#advance-field-three').show(1000);
                            $('#advance-field-four').show(1000);
                            $('#advance-field-five').hide();
                            $('#branch_ajax').show(1000);
                            $('#advance-field-six').hide();
                        });     
                    },                         
                    columns: [       
                        { data: 'checkbox'},               
                        { data: 'full_name', name: 'full_name'},
                        { data: 'book_title', name: 'getBookInformation.book_title'},
                        { data: 'publisher', name: 'getBookInformation.getPublisher.name'},
                        { data: 'genre', name: 'getBookInformation.genre'},
                        { data: 'status', name: 'getStatus.name'},
                        { data: 'assignee',name:  'getAssignee.username'},
                        { data: 'researcher',name:  'getResearcher.username'}
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
                $('.dataTables-leads thead tr').clone(false).appendTo( '.dataTables-leads thead' );
                $('.dataTables-leads thead tr:eq(1) th').each( function (i) {
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
                });

                $("#assign-submit").on('click',function(){
                    var advance = $("#advance").val();
                    var leads  = [];
                    var advance_bucket = $("#advance_bucket option:selected").val();
                    var advance_status = $("#advance_status option:selected").val();
                    var advance_country = $("#advance_country option:selected").val();
                    var advance_number_leads = $("#advance_number_leads").val();
                    var advance_assign_to = $("#advance_assigned_to option:selected").val();
                    var new_advance_status = $("#new_advance_status option:selected").val();
                    var advance_assigned_by = $("#advance_assigned_by option:selected").val();
                    var company = $("#company option:selected").val();
                    var branch = $("#branch option:selected").val();
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
                         
                             
                            if(advance_assigned_by != 0){
                                    

                                    if(advance_assigned_by == 1 || advance_assigned_by == 2 ){
                                        if(company != 0){
                                            $("#assign-leads-form").submit();
                                        }else{
                                            swal({
                                            title : "Field Required!",
                                            text  : "You should select company and branch!"
                                        });
                                        }
                                    }else if(advance_assigned_by == 3){
                                        if(advance_assigned_by == 3){
                                            if(advance_assign_to != 0 && isAdvanceChecked){
                                                
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
                                                        text  : "You should select assign by!"
                                                    });
                                             }
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>