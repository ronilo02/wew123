<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter Monthly Quota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                         
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="<?php echo e(route('quota.store')); ?>" method="POST" role="form">
                                    <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" min="0" name="quota" id="quota" class="form-control input-numeral" placeholder="quota"/>
                                </div>
                                <div class="form-group">     
                                    <button class="ladda-button btn btn-block btn-primary" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Lists of Quota</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>                     
                         
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Quota</th>
                                    <th>Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $__currentLoopData = $quota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr <?php if(now()->month == date_format($q->created_at,'m')): ?> style="background-color:#1ab394;color:#fff;cursor:pointer;" <?php endif; ?> data-toggle="modal" data-target="#notesModal<?php echo e($q->id); ?>">
                                            <td> <?php echo e(date_format($q->created_at,'M')); ?></td>
                                            <td>$<?php echo e(number_format($q->amount,2)); ?></td>
                                            <td><?php echo e(date_format($q->created_at,'Y')); ?></td>
                                              
                                                <div class="modal inmodal" id="notesModal<?php echo e($q->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content animated flipInY">
                                                                    <form role="form" id="quota-form" action="<?php echo e(url('quota/'.$q->id)); ?>" method="POST">
                                                                        <input type="hidden" name="_method" value="PUT">  
                                                                        <?php echo csrf_field(); ?>  
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                                                <h4 class="modal-title">Update Monthly Quota</h4>
                                                                                
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <div class="form-group"><label>Quota</label> <input type="text" class="form-control input-numeral-format" name="quota" value="<?php echo e(number_format($q->amount,2)); ?>" placeholder="Enter quota" class="form-control" required="required"></div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                                <button id="quota-submit" class="btn btn-primary">Save </button>
                                                                            </div>
                                                                        </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                          
                                        </tr>
                                        
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Month</th>
                                    <th>Qouta</th>    
                                    <th>Year</th>                             
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
           
       </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
   <script>
       $(document).ready(function(){
           $('#quota-submit').on('click',function(e){
               e.preventDefault();
               $('#quota-form').submit();
           });

            var cleaveNumeral = new Cleave('.input-numeral', {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });

                var cleaveNumeraltwo = new Cleave('.input-numeral-format', {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                });
    
       });
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>