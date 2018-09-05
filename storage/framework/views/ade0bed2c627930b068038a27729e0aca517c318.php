<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
            
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Leads</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-leads" >
                            <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Book Title</th>
                                    <th>Publisher</th>
                                    <th>Email</th>
                                    <th>Genre</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Researcher</th>
                                    <th style="width:5%;"></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   
                                   <td ><a href="<?php echo e(url('leads/'.$lead->id.'/profile')); ?>" style="color:#1ab394;"><?php echo e($lead->fullname()); ?> </a></td>
                                   <td><?php echo e($lead->getBookInformation->book_title); ?></td>
                                   <td><?php echo e($lead->getBookInformation->getPublisher == null? " ":$lead->getBookInformation->getPublisher['name']); ?></td>
                                   <td><?php echo e($lead->email); ?></td>
                                   <td><?php echo e($lead->getBookInformation->genre); ?></td>
                                   <td><?php echo e($lead->getStatus->name); ?></td>
                                   <td><?php echo e($lead->getAssignee == null ? "" : $lead->getAssignee->fullname()); ?></td>
                                   <td><?php echo e($lead->getResearcher->fullname()); ?></td>
                                   <td></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Author</th>
                                    <th>Book Title</th>
                                    <th>Publisher</th>
                                    <th>Email</th>
                                    <th>Genre</th>
                                    <th>Status</th>
                                    <th>Assigned to</th>
                                    <th>Researcher</th>
                                    <th style="width:5%;"></th>
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
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>