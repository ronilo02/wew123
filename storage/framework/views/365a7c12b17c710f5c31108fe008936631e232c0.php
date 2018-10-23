<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>View Notifications</h5>
                    </div>
                    <div class="ibox-content">
                        <?php $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('modules.notifications.' . snake_case(class_basename($notification->type)), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if(count(Auth::user()->unreadNotifications)): ?>
                            <form action="/profile/<?php echo e(Auth::id()); ?>/notifications" method="POST">
                                <?php echo e(method_field('DELETE')); ?>

                                <?php echo e(csrf_field()); ?>

                                <button type="submit" class="btn btn-sm btn-danger">
                                    Mark all as read
                                </button>
                            </form>
                        <?php elseif(!count(Auth::user()->unreadNotifications)): ?>
                            <h5><em>There are no new notifications</em></h5>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>