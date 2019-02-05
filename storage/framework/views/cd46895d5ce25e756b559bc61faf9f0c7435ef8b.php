<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Over All Leads</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo e($leads_count); ?></h1>
                                <small>Total</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Assigned Leads</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo e($assigned_leads_count); ?></h1>
                                <small>Total</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Monthly</span>
                                <h5>Team Quota</h5>
                            </div>
                            <div class="ibox-content">
                              <h1 class="no-margins"><?php if($quota != null): ?> <?php echo e('$'.number_format($quota->amount,2)); ?> <?php else: ?> $0 <?php endif; ?></h1>
                              
                                <small>Total Amount</small>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row">                  

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Activity Stream</h5>
                                <span class="label label-primary">Update</span>
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

                            <div class="ibox-content inspinia-timeline">
                                <?php $__currentLoopData = $activity_logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity_log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="timeline-item">
                                        <div class="row">
                                            <div class="col-xs-3 date">
                                                <i class="fa fa-briefcase"></i>
                                                <?php echo e(date_format($activity_log->created_at,'M d,y')); ?>

                                                <br/>
                                                <small class="text-navy"><time class="timeago" datetime="<?php echo e($activity_log->created_at); ?>"><?php echo e($activity_log->created_at->diffForhumans()); ?></time> </small>
                                            </div>
                                            <div class="col-xs-7 content no-top-border">
                                                <p class="m-b-xs"><strong><?php echo e($activity_log->causer->fullname()); ?></strong></p>

                                                <p><?php echo e($activity_log->description); ?></p>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>