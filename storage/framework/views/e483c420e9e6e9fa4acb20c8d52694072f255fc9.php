<?php $__env->startSection('content'); ?>
      
      <div class="row  border-bottom white-bg dashboard-header">
                  <div class="col-md-12">
                        <?php if(auth()->user()->can('edit.leads') || auth()->user()->hasRole('superadmin')): ?>
                              <a href="<?php echo e(url('leads/'.$lead->id.'/edit')); ?>" data-toggle="tooltip" data-placement="top" title="Edit Status"  class="pull-right"><i style="color:#1ab394" data-toggle="tooltip" data-placement="top" title="Edit Lead" class="fa fa-pencil"></i></a>
                        <?php endif; ?>
                          <h1><?php echo e($lead->fullname()); ?></h1>                 
                  </div>
                  <div class="col-sm-6">
                 
                  <h5  style="color:#1ab394">*Personal Information</h5>
                  <ul class="list-group clear-list m-t">
                        <li class="list-group-item fist-item">
                              <span class="pull-right" style="color:#b1aeae;">
                                <?php echo e($lead->street." ".$lead->city." ".$lead->state." ".$lead->postal_code." ,".$lead->country); ?>

                              </span>
                              <span class="label label-danger"><i class="fa fa-map-marker"></i></span> Primary Address
                        </li>
                        <li class="list-group-item">
                              <span class="pull-right" style="color:#b1aeae;">
                                 <?php echo e($lead->email); ?>

                              </span>
                              <span class="label label-info"><i class="fa fa-envelope"></i></span> Email
                        </li>
                        <li class="list-group-item">
                              <span class="pull-right" style="color:#b1aeae;">
                               <?php echo e($lead->Website); ?>

                              </span>
                              <span class="label label-primary"><i class="fa fa-globe"></i></span> Website
                        </li>
                        <li class="list-group-item">
                              <span class="pull-right" style="color:#b1aeae;">
                                <?php echo e($lead->remarks); ?>

                              </span>
                              <span class="label label-warning"><i class="fa fa-file-text-o"></i></span> Remarks
                        </li>
                      
                  </ul>
                  </div>

                  <div class="col-sm-6">
                        <h5  style="color:#1ab394">*Contact Information 
                              <i class="fa fa-times-circle fa-2x pull-right" id="contact_close" style="cursor:pointer;"></i>
                              <i class="fa fa-check-circle fa-2x pull-right" id="contact_save" style="cursor:pointer;"></i>
                              <i class="fa fa-pencil  pull-right" id="contact_pencil" data-toggle="tooltip" data-placement="top" title="Edit Contact Information" style="cursor:pointer;"></i>
                        </h5>
                              <ul class="list-group clear-list m-t">
                                    <li class="list-group-item fist-item">
                                          <div class="row">
                                                <div class="col-sm-4">
                                                      <span class="label label-default"><i class="fa fa-phone"></i></span> Home Phone
                                                </div>
                                                <div class="col-sm-8">
                                                      <div id="contact_display">
                                                            <span class="pull-right" id="home_phone_display" style="color:#b1aeae;">
                                                            <?php echo e($lead->home_phone); ?>

                                                            </span>
                                                      </div>
                                                      <div id="contact_fields">
                                                            <input type="text" name="home_phone" value="<?php echo e($lead->home_phone); ?>" data-mask="(999) 999-9999"  id="home_phone" class="form-control">
                                                      </div>
                                                </div>
                                          </div>
                                    </li>
                                    <li class="list-group-item">
                                           <div class="row">
                                                <div class="col-sm-4">
                                                      <span class="label label-default"><i class="fa fa-mobile-phone"></i></span> Mobile Phone
                                                </div>
                                                <div class="col-sm-8">
                                                      <div id="contact_display">
                                                            <span class="pull-right" id="mobile_phone_display" style="color:#b1aeae;">
                                                                  <?php echo e($lead->mobile_phone); ?>

                                                            </span>
                                                      </div>
                                                     <div id="contact_fields">  
                                                        <input type="text" name="mobile_phone"  value="<?php echo e($lead->mobile_phone); ?>"  id="mobile_phone" class="form-control">
                                                      </div> 
                                                </div>
                                           </div>
                                          
                                        
                                    </li>
                                    <li class="list-group-item">
                                           <div class="row">
                                                <div class="col-sm-4">
                                                       <span class="label label-default"><i class="fa fa-phone-square"></i></span> office Phone
                                                </div>
                                                <div class="col-sm-8">
                                                      <div id="contact_display">
                                                            <span class="pull-right" id="office_phone_display" style="color:#b1aeae;">
                                                                  <?php echo e($lead->office_phone); ?>

                                                            </span>
                                                      </div>
                                                      <div id="contact_fields">
                                                             <input type="text" name="office_phone"  value="<?php echo e($lead->office_phone); ?>"  id="office_phone" class="form-control">
                                                      </div>
                                                </div>
                                           </div>
                                         
                                         
                                    </li>
                                    <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                        <span class="label label-default"><i class="fa fa-book"></i></span> Other Phone
                                                </div>
                                                <div class="col-sm-8">
                                                       <div id="contact_display">
                                                            <span class="pull-right" id="other_phone_display" style="color:#b1aeae;">
                                                                  <?php echo e($lead->other_phone); ?>

                                                            </span>
                                                        </div>
                                                        <div id="contact_fields">
                                                              <input type="text" name="other_phone" value="<?php echo e($lead->other_phone); ?>"   id="other_phone" class="form-control">
                                                        </div>
                                                </div>
                                           </div>
                                          
                                        
                                    </li>
                              
                              </ul>
                         </div>
                  </div>


            <div class="wrapper wrapper-content animated fadeInRight">                  
                        <div class="ibox float-e-margins">
                              <div class="ibox-title">
                                  <h5><i class="fa fa-book"></i> Book Information</h5>
                                    <div class="ibox-tools">
                                    <a class="collapse-link">
                                          <i class="fa fa-chevron-up"></i>
                                    </a>
                                    
                                    </div>
                              </div>
                              <div class="ibox-content">
                              <div class="row">                  
                                     <div class="col-sm-8 b-r">
                                    <ul class="list-group clear-list m-t">
                                          <li class="list-group-item fist-item">                                               
                                                Book Title
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <?php echo e($lead->getBookInformation->book_title); ?>

                                                </span>
                                          </li>
                                          <li class="list-group-item">                                                
                                                Published Date
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <?php echo e($lead->getBookInformation->published_date); ?>

                                                </span>
                                          </li>
                                          <li class="list-group-item">                                               
                                                Previous Publisher
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <?php echo e($lead->getBookInformation->getPublisher->name); ?>

                                                </span>
                                          </li>
                                          <li class="list-group-item">                                               
                                                Book Reference
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <a href="<?php echo e($lead->getBookInformation->book_reference); ?>"><?php echo e($lead->getBookInformation->book_reference); ?></a>
                                                </span>
                                          </li>                                        
                                    </ul>
                              </div>

                               <div class="col-sm-4 ">
                                    <ul class="list-group clear-list m-t">
                                          <li class="list-group-item fist-item" >
                                                <div id="label_section">
                                                      <span class="pull-right" id="status_section" style="color:#b1aeae;">
                                                            <label  class="<?php echo e($lead->getStatus->class); ?>" id="status_name"><?php echo e($lead->getStatus->name); ?></label>
                                                            <!-- <i style="color:#1ab394;cursor:pointer;" class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit Status" id="edit_status_pencil"></i>    -->
                                                      </span>
                                                      
                                                      <span id="status_label">Status</span>
                                                </div>
                                                <div class="row" id="field_section">
                                                      <div class="col-sm-10">
                                                            <select name="status" id="status_field" class="form-control">
                                                                  <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                  <option value="<?php echo e($key); ?>" name="<?php echo e($val); ?>" <?php if($key == $lead->status): ?> selected="selected" <?php endif; ?>><?php echo e($val); ?></option>
                                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                            </select>
                                                      </div>
                                                      <div class="col-sm-2">
                                                            <i style="margin-top:5px;color:#ed5565" class="fa fa-times-circle fa-2x " id="cancel_edit_status"></i>
                                                      </div>         
                                                </div> 
                                          </li>
                                          <li class="list-group-item">
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <?php echo e($lead->getBookInformation->genre); ?>

                                                </span>
                                                Genre
                                          </li>
                                          <li class="list-group-item">
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <?php echo e($lead->getBookInformation->isbn); ?>

                                                </span>
                                                ISBN
                                          </li>  
                                          <li class="list-group-item">
                                                <span class="pull-right" style="color:#b1aeae;">
                                                <label for="" class="label label-danger"><?php echo e($lead->getResearcher->fullname()); ?></label>
                                                </span>
                                                Researcher
                                          </li>                                                                        
                                    
                                    </ul>
                              </div>

                        </div>
                  </div>
            </div>

          
             <div class="wrapper wrapper-content animated fadeInRight">
                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                              <h5><i class="fa fa-book"></i> Notes</h5>
                              <div class="ibox-tools">
                              <span style="cursor:pointer;" data-toggle="modal" data-target="#notesModal">
                                    
                                    <i class="fa fa-plus" style="color:#1ab394"> New</i>
                              </span>                     
                        </div>
                   </div>

                  <form role="form" id="notesform" action="<?php echo e(url('leads/store/notes')); ?>" method="POST" enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                         <div class="modal inmodal" id="notesModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated flipInY">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Add Notes</h4>
                                            <small class="font-bold" style="color:#1ab394">*This notes represents for any updates of this author</small>
                                        </div>
                                        <div class="modal-body">
                                                <div class="form-group"><label>Subject</label> <input type="text" name="subject"  placeholder="Enter Subject" class="form-control" required="required"></div>
                                                <div class="form-group"><label>File</label> <input type="file" name="file"  placeholder="Enter Subject" class="form-control" ></div>
                                                <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" placeholder="Notes Here...." required="required"></textarea>
                                                <input type="hidden" name="lead" value="<?php echo e($lead->id); ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     </form>       

                    <div class="ibox-content">
                        
                        <div class="table-responsive">
                              <table class="table table-striped table-hover dataTables-notes" >
                                    <thead>
                                          <tr>
                                                <th>Subject</th>
                                                <th>Notes</th>
                                                <th>Date Created</th>
                                                <th>Created By</th>
                                                <th></th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                      <td><span style="cursor:pointer;color:#1ab394" data-toggle="modal" data-target="#notes<?php echo e($n->id); ?>"><?php echo e(mb_strimwidth($n->subject, 0, 30, "...")); ?></span></td>
                                                      <td> <?php echo e(mb_strimwidth($n->notes, 0, 50, "...")); ?></td>
                                                      <td><?php echo e(date('M d,Y h:i a', strtotime($n->created_at))); ?></td>
                                                      <td>
                                                            <?php if($n->getUser->id == auth()->user()->id): ?>
                                                            You 
                                                            <?php else: ?>
                                                            <?php echo e($n->getUser->fullname()); ?>

                                                            <?php endif; ?>
                                                      </td>
                                                      <td>
                                                      <span style="cursor:pointer;color:#1ab394" data-toggle="modal" data-target="#editnotes<?php echo e($n->id); ?>"><i class="fa fa-pencil" style="cursor:pointer;color:#1ab394;"></i></span>
                                                      </td>
                                                </tr>

                                                <!-- Notes View Modal -->
                                                <div class="modal inmodal" id="notes<?php echo e($n->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                            <div class="modal-content animated flipInY">
                                                            <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                  <h4 class="modal-title"><?php echo e(ucfirst($n->subject)); ?></h4>
                                                                  <small class="font-bold" style="color:#1ab394">By: <?php echo e($n->getUser->fullname()); ?> | <?php echo e(date('M d,Y h:i a', strtotime($n->created_at))); ?></small> 
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="row">
                                                                        <div class="col-mid-12">
                                                                        <p>
                                                                        <?php echo e($n->notes); ?>

                                                                        </p>     
                                                                        </div>
                                                                        <div class="hr-line-dashed"></div>
                                                                        <div class="col-mid-12">
                                                                        <div class="file-box">
                                                                              <div class="file">
                                                                                    <a href="#">
                                                                                    <span class="corner"></span>
                                                                                    <?php if($n->file_type == 'file'): ?>
                                                                                    <div class="icon">
                                                                                          <i class="fa fa-file"></i>
                                                                                    </div>
                                                                                    <?php else: ?>
                                                                                    <div class="image">
                                                                                          <img alt="image" class="img-responsive" src="<?php echo e(asset('storage/files/notes/'.$n->files)); ?>">
                                                                                    </div>
                                                                                    <?php endif; ?>
                                                                                    <div class="file-name">
                                                                                          <a href="<?php echo e(url('leads/'.$n->id.'/download')); ?>"><?php echo e(ucfirst($n->files)); ?></a>
                                                                                          <br/>
                                                                                          <small>Added: <?php echo e(date('M d,Y h:i a', strtotime($n->created_at))); ?></small>
                                                                                    </div>
                                                                                    </a>
                                                                              </div>

                                                                        </div>     
                                                                        </div> 
                                                                  </div>       
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                  
                                                            </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                    </tbody>
                              </table>

                                  <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                    <!-- Modal Notes Edit -->
                                    <form role="form" action="<?php echo e(url('leads/notes/'.$note->id.'/update')); ?>" id="edit-lead-form" method="POST" enctype="multipart/form-data">
                                                      <!-- <input type="hidden" name="_method" value="PUT"> -->
                                                <?php echo csrf_field(); ?>
                                                <div class="modal inmodal" id="editnotes<?php echo e($note->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                            <div class="modal-content animated flipInY">
                                                            <div class="modal-header">
                                                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                  <h4 class="modal-title">Edit Note</h4>
                                                                  <small class="font-bold" style="color:#1ab394">*After editing this note it's advisable to notify the sale assigned on this author</small> 
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="form-group"><label>Subject</label> <input type="text" name="subject" value="<?php echo e($note->subject); ?>"  placeholder="Enter Subject" class="form-control" required="required"></div>
                                                                  <div class="form-group"><label>File</label> <input type="file" name="file"  placeholder="Enter Subject" class="form-control" ></div>
                                                                  <textarea name="notes" id="notes" cols="30" rows="10" class="form-control" value="<?php echo e($note->notes); ?>" placeholder="Notes Here...." required="required"><?php echo e($n->notes); ?></textarea>
                                                                  <input type="hidden" name="lead" value="<?php echo e($lead->id); ?>">    
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary" >Save changes</button>
                                                            </div>
                                                            </div>
                                                      </div>
                                                </div>
                                                </form>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
                              </div>  

                    </div>          
             </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
      <script>
            $(document).ready(function(){
                  var lead       = <?php echo e($lead->id); ?>;
                  toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-bottom-center",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                              };

                  $('#edit-submit').on('click',function(e){
                        e.PreventDefault();                    
                        $('#edit-lead-form').submit();
                  });

                  //Status Jquery 

                  // $('#edit_status_pencil').hide();
                  $('#field_section').hide();

                  // $('#status_section').hover(function(){
                  //       $('#edit_status_pencil').show();
                  // },function(){
                  //       $('#edit_status_pencil').hide();
                  // });

                  $('#status_name').dblclick(function(){
                        $('#label_section').hide();
                        $('#field_section').show();
                  });

                  $('#cancel_edit_status').on('click',function(){
                        $('#label_section').show();
                        $('#field_section').hide();
                  });

                  $('#status_field').on('change',function(){
                        var new_status = $("#status_field").val();
                        var name       = $("#status_field").find('option:selected').attr("name");
                        
                        var url        = "/leads/"+lead+"/update";                       
                     
                        $.ajax({
                              type:"POST",
                              url:url,
                              
                              data:{
                               status:new_status,
                               _token: "<?php echo e(csrf_token()); ?>",       
                              },
                              success:function(result){
                                    toastr["success"]("Status successfully updated to "+name);

                                    $("#status_name").html(name);
                                    $('#label_section').show();
                                     $('#field_section').hide();
                              },
                              error:function(error){
                                    toastr["error"]("Failed to update status!");

                              }
                             
                        });
                  });

                  //end of status jquery


                  //Contacts Jquery

                  $("div#contact_fields").hide();
                  $("#contact_save").hide();
                  $("#contact_close").hide();

                  $("#contact_pencil").on("click",function(){
                        $(this).hide();
                        $("#contact_save").show();
                        $("#contact_close").show();
                        $("div#contact_fields").show();
                        $("div#contact_display").hide();
                  });

                  $("#contact_close").on("click",function(){
                        $(this).hide();
                        $("#contact_save").hide();
                        $("#contact_pencil").show();
                        $("div#contact_fields").hide();
                        $("div#contact_display").show();
                  });

                  $("#contact_save").on("click",function(){
                        var home_phone = $("#home_phone").val();
                        var mobile_phone = $("#mobile_phone").val();
                        var office_phone = $("#office_phone").val();
                        var other_phone = $("#other_phone").val();
                        var url        = "/leads/"+lead+"/update";  

                        $.ajax({
                              type:"POST",
                              url:url,
                              data:{
                               home_phone:home_phone,
                               mobile_phone:mobile_phone,
                               office_phone:office_phone,
                               other_phone:other_phone,
                               _token: "<?php echo e(csrf_token()); ?>",       
                              },
                              success:function(result){
                                    toastr["success"]("Contact information successfully updated!");
                                     
                                    $("#home_phone").val(home_phone);
                                    $("#mobile_phone").val(mobile_phone);
                                    $("#office_phone").val(office_phone);
                                    $("#other_phone").val(other_phone);

                                    $("#home_phone_display").html(home_phone);
                                    $("#mobile_phone_display").html(mobile_phone);
                                    $("#office_phone_display").html(office_phone);
                                    $("#other_phone_display").html(other_phone);

                                    $("#contact_close").hide();
                                    $("#contact_save").hide();
                                    $("#contact_pencil").show();
                                    $("div#contact_fields").hide();
                                    $("div#contact_display").show();
                              },
                              error:function(error){
                                    toastr["error"]("Failed to update contact information!");

                              }
                             
                        });

                  });

                  //End of Contacts Jquery


                  //Keyboard shortcuts for creating notes
                  Mousetrap.bind('N', function(){
                        $('#notesModal').modal('toggle');
                  });



            });
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>