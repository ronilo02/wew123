<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Name</h5>
                        <div class="ibox-tools">
                            
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                         
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <form action="<?php echo e(url('company/'.$company->id)); ?>" method="POST" role="form">
                                <input type="hidden" name="_method" value="PUT">
                                    <?php echo csrf_field(); ?>
                                <div class="form-group">
                                <input type="text" name="company_name" id="company_name" value="<?php echo e($company->name); ?>" class="form-control" placeholder="Company Name" required/>
                                </div>
                                <div class="form-group">     
                                    <button class="ladda-button btn btn-block btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Company Branch</h5>
                        <div class="ibox-tools">
                            <button class="ladda-button btn btn-primary btn-xs" data-toggle="modal" data-target="#branchmodal"><i class="fa fa-plus"> New</i></button>   
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Branch Name</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $company->branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($b->id); ?>

                                        </td>
                                        <td>
                                        <a data-toggle="modal" data-target="#branch<?php echo e($b->id); ?>"><?php echo e($b->name); ?></a>
                                        </td>
                                    </tr>
                                    <form action="<?php echo e(url('branch/'.$b->id)); ?>" method="POST" role="form">
                                        <input type="hidden" name="_method" value="PUT">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal inmodal" id="branch<?php echo e($b->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content animated flipInY">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title">Add Branch</h4>                                    
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="form-group"><label>Branch Name</label> <input type="text" name="branch_name" value="<?php echo e($b->name); ?>" placeholder="Enter branch name" class="form-control" required="required"></div>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Add </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Branch Name</th>                         
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
                
                <form role="form" action="<?php echo e(route('branch.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                    <div class="modal inmodal" id="branchmodal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content animated flipInY">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Add Branch</h4>                                    
                                </div>
                                <div class="modal-body">
                                        <div class="form-group"><label>Branch Name</label> <input type="text" name="branch_name"  placeholder="Enter branch name" class="form-control" required="required"></div>
                                        <input type="hidden" name="company" value="<?php echo e($company->id); ?>">
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
       $(document).ready(function(){
           
       });
        //Keyboard shortcuts for creating notes
            Mousetrap.bind('N', function(){
                        $('#branchmodal').modal('toggle');
                  });
    
   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>