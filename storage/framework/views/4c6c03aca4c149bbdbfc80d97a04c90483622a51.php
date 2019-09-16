        
         <form role="form" action="<?php echo e(url('/leads/import/store')); ?>" method="POST">
         <?php echo csrf_field(); ?>
         
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5><i class="fa fa-drupal" style="color:#1ab394"></i> Valid Leads</h5>
                                <div class="ibox-tools">
                                Total : <?php echo e(count($valid_data)); ?>

                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>                            
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                            <?php if(count($valid_data) > 0): ?>
                          <input type="hidden" name="data" value="<?php echo e(json_encode($valid_data)); ?>">
                                <table class="table table-striped table-bordered table-hover dataTables-lead-import" >
                                    <thead>
                                        <tr >
                                            <th >Author</th>
                                            <th >Publisher</th>
                                            <th >Mobile #</th>
                                            <th >Office #</th>
                                            <th >Phone #</th>
                                            <th >Other #</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $valid_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="text-align:left;">
                                        <td><?php echo e($d->first_name." ".$d->last_name); ?></td>
                                        <td><?php echo e($d->previous_publisher); ?></td>
                                        <td><?php echo e($d->mobile_phone); ?></td>
                                        <td><?php echo e($d->office_phone); ?></td>
                                        <td><?php echo e($d->home_phone); ?></td>
                                        <td><?php echo e($d->other_phone); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th >Author</th>
                                            <th >Publisher</th>
                                            <th >Mobile #</th>
                                            <th >Office #</th>
                                            <th >Phone #</th>
                                            <th >Other #</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                                <br>
                                <button class="btn btn-primary pull-right">Save</button>
                                <?php else: ?>
                                <h3 class="error-msg" style="color:#d0cdcd">No Valid Leads Found!</h3>
                                <?php endif; ?>
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
              </div>  

            <div class="row">
              <div class="col-lg-12">
                <div class="ibox float-e-margins">
                        <div class="ibox-title">
                                <h5><i class="fa fa-arrows-alt" style="color:#ff2121"></i> Invalid Leads</h5>
                                <div class="ibox-tools">
                                Total : <?php echo e(count($invalid_data)); ?>

                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>                            
                                </div>
                        </div>
                        <div class="ibox-content">
                            <div class="table-responsive">
                            <?php if(count($invalid_data) > 0): ?>
                                <table class="table table-striped table-bordered table-hover dataTables-lead-import" >
                                    <thead>
                                        <tr>
                                            <th>Author</th>
                                           
                                            <th>Error Details</th>                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $invalid_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                       
                                            <tr>
                                                <td style="text-align:left;"><?php echo e($id->author_name); ?></td>                                              
                                                <td style="text-align:left;">
                                                 <?php $__currentLoopData = $id->error_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e(url('leads/'.$ed->id.'/edit')); ?>" target="_target" style="color:red;"><?php echo e($ed->description); ?>  </a>
                                                    <br/>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Author</th>
                                            
                                            <th>Error Details</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                                <?php else: ?>
                                <h3 class="error-msg" style="color:#d0cdcd">No Invalid Leads Found!</h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
    </form>