<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter New Permission </h5>
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
                            <?php if(isset($permissiondata)): ?>
                            <form role="form" action="<?php echo e(url('permission/'.$permissiondata->id)); ?>" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <?php else: ?>
                            <form role="form" action="<?php echo e(route('permission.store')); ?>" method="POST">   
                            <?php endif; ?>                            
                                 <?php echo csrf_field(); ?>
                                    <div class="form-group"><label>Name</label> <input type="text" name="name" value="<?php if(isset($permissiondata)): ?> <?php echo e($permissiondata->name); ?> <?php endif; ?>" placeholder="Enter Name" class="form-control" required></div>
                                    <div class="form-group"><label>Display Name</label> <input type="text" value="<?php if(isset($permissiondata)): ?> <?php echo e($permissiondata->display_name); ?> <?php endif; ?>" name="display_name" placeholder="Enter Display Name" class="form-control" required> </div>
                                    <div class="form-group"><label>Description</label> <input type="text" value="<?php if(isset($permissiondata)): ?> <?php echo e($permissiondata->description); ?> <?php endif; ?>" name="description" placeholder="Enter Description" class="form-control" required></div>
                                    <div>
                                    <button class="ladda-button btn btn-primary pull-right" data-style="slide-right"><?php if(isset($permissiondata)): ?> Update <?php else: ?> Save <?php endif; ?></button>                               
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Horizontal form</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                                <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-permission" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                             <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td ><a href="<?php echo e(url('permission/'.$permission->id.'/edit')); ?>" style="color:#1ab394;"><?php echo e($permission->name); ?></a></td>
                                    <td><?php echo e($permission->display_name); ?></td>
                                    <td><?php echo e($permission->description); ?></td>
                                </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                    
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>