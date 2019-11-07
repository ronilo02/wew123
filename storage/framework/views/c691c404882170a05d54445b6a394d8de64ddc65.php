<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>User Lists</h5>
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
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><img src="<?php echo e(asset('storage/files/users/'.$user->avatar)); ?>" alt="" class="img-circle" width="30px" height="30px"></td>
                                    <td style="color:#1ab394;"><a href="<?php echo e(url('user/'.$user->id.'/edit')); ?>"><?php echo e($user->fullname()); ?></a></td>            
                                    <td><?php echo e($user->username); ?>  </td>
                                    <td><?php echo e($user->email); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $user->getRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="<?php echo e($role->getRole->class); ?>"><?php echo e($role->getRole->display_name); ?></label>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <label class="label <?php if($user->status == 1): ?> label-primary <?php else: ?> label-danger <?php endif; ?>"><?php echo e($user->getstatus['name']); ?></label>
                                    </td>
                                </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"></th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
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