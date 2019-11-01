<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Lists</h5>
                        <div class="ibox-tools">
                            <div class="ibox-tools">
                                <button class="ladda-button btn btn-primary btn-xs" data-toggle="modal" data-target="#companymodal"><i class="fa fa-plus"> New</i></button>   
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>No. of Branch</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($c->id); ?></td>
                                        <td><a href="<?php echo e(url('company/'.$c->id.'/edit')); ?>"><?php echo e($c->name); ?> </a></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>No. of Branch</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>

                
                <form role="form" action="<?php echo e(route('company.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    <div class="modal inmodal" id="companymodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated flipInY">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Add Company</h4>                                    
                                </div>
                                <div class="modal-body">
                                        <div class="form-group"><label>Company Name</label> <input type="text" name="company_name"  placeholder="Enter company name" class="form-control" required="required"></div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                   
            </div>
           
       </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script>
        //Keyboard shortcuts for creating notes
        Mousetrap.bind('N', function(){
                        $('#companymodal').modal('toggle');
                  });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>