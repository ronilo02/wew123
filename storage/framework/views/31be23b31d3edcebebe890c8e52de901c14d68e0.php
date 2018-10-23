<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
    <?php if(isset($lead)): ?>
    <form role="form" action="<?php echo e(url('leads/'.$lead->id)); ?>" id="lead-form" method="POST">
     <input type="hidden" name="_method" value="PUT">
     <?php else: ?>
    <form role="form" action="<?php echo e(route('leads.store')); ?>" method="POST">
    <?php endif; ?>
         <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Author Overview</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r">
                                <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-info-circle" style="color:#1ab394"></i> Author Information</h3>
                                   
                                    <div class="form-group"><label>Firstname</label> <input type="text" name="firstname" value="<?php if(isset($lead)): ?> <?php echo e($lead->firstname); ?>  <?php endif; ?>" placeholder="Enter Firstname" class="form-control" required> </div>
                                    <div class="form-group"><label>Middlename</label> <input type="text" name="middlename" value="<?php if(isset($lead)): ?> <?php echo e($lead->middlenames); ?>  <?php endif; ?>" placeholder="Enter Middlename" class="form-control" ></div>
                                    <div class="form-group"><label>Lastname</label> <input type="text" name="lastname" value="<?php if(isset($lead)): ?> <?php echo e($lead->lastname); ?>  <?php endif; ?>" placeholder="Enter Lastname" class="form-control" required></div>
                                    
                                    <div class="form-group"><label>Primary Email</label> <input type="email" name="email" value="<?php if(isset($lead)): ?> <?php echo e($lead->email); ?>  <?php endif; ?>" placeholder="Enter Primary Email" class="form-control" required></div>
                            </div>
                            <div class="col-sm-6"><h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-phone-square fa-sm" style="color:#1ab394"></i> Contact Details</h3>
                                  
                                    <div class="form-group"><label>Home Phone</label> <input type="text" name="home_phone" value="<?php if(isset($lead)): ?> <?php echo e($lead->home_phone); ?>  <?php endif; ?>" placeholder="Enter Home Phone" class="form-control"></div>
                                    <div class="form-group"><label>Mobile Phone</label> <input type="text" name="mobile_phone" value="<?php if(isset($lead)): ?> <?php echo e($lead->mobile_phone); ?>  <?php endif; ?>" placeholder="Enter Mobile Phone" class="form-control"></div>
                                    <div class="form-group"><label>office Phone</label> <input type="text" name="office_phone" value="<?php if(isset($lead)): ?> <?php echo e($lead->office_phone); ?>  <?php endif; ?>" placeholder="Enter office Phone" class="form-control"></div>
                                    <div class="form-group"><label>Other Phone</label> <input type="text" name="other_phone" value="<?php if(isset($lead)): ?> <?php echo e($lead->other_phone); ?>  <?php endif; ?>" placeholder="Enter Other Phone" class="form-control"></div>
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                    <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-map-marker" style="color:#1ab394"></i> Address Information</h3>
                                    <div class="form-group"><label>Street</label> <input type="text" name="street" value="<?php if(isset($lead)): ?> <?php echo e($lead->street); ?>  <?php endif; ?>" placeholder="Enter Street" class="form-control" ></div>
                                    <div class="form-group"><label>City</label> <input type="text" name="city" value="<?php if(isset($lead)): ?> <?php echo e($lead->city); ?>  <?php endif; ?>" placeholder="Enter City" class="form-control" required></div>
                                    <div class="form-group"><label>State</label> <input type="text" name="state" value="<?php if(isset($lead)): ?> <?php echo e($lead->state); ?>  <?php endif; ?>" placeholder="Enter State" class="form-control" required></div>
                                    <div class="form-group"><label>Postal Code</label> <input type="text" name="postal_code" value="<?php if(isset($lead)): ?> <?php echo e($lead->postal_code); ?>  <?php endif; ?>" placeholder="Enter Postal Code" class="form-control" required></div>
                                    <div class="form-group"><label>Country</label> 
                                        <select name="country" id="country" class="form-control">
                                                <option>Select Country</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php if(isset($lead) && $key == $lead->country): ?> selected="selected"  <?php endif; ?>><?php echo e($val); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                    <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-map-marker" style="color:#1ab394"></i> Other Information</h3>
                                    <div class="form-group"><label>Website</label> <input type="text" name="website" value="<?php if(isset($lead)): ?> <?php echo e($lead->website); ?>  <?php endif; ?>" placeholder="Enter Website Link" class="form-control" ></div>
                                    <div class="form-group"><label>Remarks</label> <textarea name="remarks" value="<?php if(isset($lead)): ?> <?php echo e($lead->remarks); ?>  <?php endif; ?>" id="" placeholder="Add remarks or note..." class="form-control" cols="30" rows="10"><?php if(isset($lead)): ?> <?php echo e($lead->remarks); ?>  <?php endif; ?></textarea></div>
                                    
                                        <div>
                                        <button  class="ladda-button btn btn-primary pull-right" data-style="slide-right" id="submit-user">Add</button>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
         
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"> 
                        <h5> More Information</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                        </div>
                    </div>
                    <div class="ibox-content">
                    <h3 class="m-t-none m-b" style="color:#1ab394"><i class="fa fa-book" style="color:#1ab394"></i> Book Information</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                    <div class="form-group" id="published_date">
                                        <label >Published Date</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="published_date" id="published_date" value="<?php if(isset($lead)): ?> <?php echo e(date_format(date_create($lead->getBookInformation->published_date),'m/d/Y')); ?> <?php endif; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group"><label>Previous Publisher</label> 
                                        <select name="previous_publisher" id="previous_publisher" class="form-control">
                                                <option>Select Publisher</option>
                                            <?php $__currentLoopData = $publisher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php if(isset($lead) && $key == $lead->getBookInformation->previous_publisher): ?> selected="selected" <?php endif; ?> ><?php echo e($val); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                    <div class="form-group"><label>Book Title</label> <input type="text" name="book_title" value="<?php if(isset($lead)): ?> <?php echo e($lead->getBookInformation->book_title); ?> <?php endif; ?>" placeholder="Enter Book Title" class="form-control" required></div>
                                    
                                    <div class="form-group"><label>Book Reference</label> <input type="text" name="book_reference" value="<?php if(isset($lead)): ?> <?php echo e($lead->getBookInformation->book_reference); ?> <?php endif; ?>" placeholder="Enter Book Reference" class="form-control" required></div>
                            </div>
                            <div class="col-sm-6">
                                    <div class="form-group"><label>Genre</label> <input type="text" name="genre" value="<?php if(isset($lead)): ?> <?php echo e($lead->getBookInformation->genre); ?> <?php endif; ?>" placeholder="Enter Genre" class="form-control" required></div>
                                    <div class="form-group"><label>ISBN</label> <input type="text" name="isbn" class="form-control" value="<?php if(isset($lead)): ?> <?php echo e($lead->getBookInformation->isbn); ?> <?php endif; ?>" data-mask="999-99-999-9999-9" placeholder=""></div>
                                    <div class="form-group"><label>Status</label> 
                                        <select name="status" id="status" class="form-control">
                                                <option>select status</option>
                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php if(isset($lead) && $key == $lead->status): ?> selected="selected" <?php endif; ?>><?php echo e($val); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_css'); ?>
    .avia-data-table td {
        font-size: 10px !important;
    }
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script>
        $(document).ready(function(){
            $('#published_date .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>