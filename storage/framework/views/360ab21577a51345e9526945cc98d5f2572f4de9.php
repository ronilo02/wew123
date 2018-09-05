<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
         <div class="row">
         <?php if(isset($roledata)): ?>
             <form role="form" action="<?php echo e(url('role/'.$roledata->id)); ?>" method="POST">
             <input type="hidden" name="_method" value="PUT">
         <?php else: ?>
             <form role="form" action="<?php echo e(route('role.store')); ?>" method="POST">
         <?php endif; ?>
             <?php echo csrf_field(); ?>
            <div class="col-lg-5">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Enter New Role </h5>
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
                                    <div class="form-group"><label>Name</label> <input type="text" name="name" value="<?php if(isset($roledata)): ?> <?php echo e($roledata->name); ?> <?php endif; ?>" placeholder="Enter Name" class="form-control" required></div>
                                    <div class="form-group"><label>Display Name</label> <input type="text" name="display_name" value="<?php if(isset($roledata)): ?> <?php echo e($roledata->display_name); ?> <?php endif; ?>" placeholder="Enter Display Name" class="form-control" required> </div>
                                    <div class="form-group"><label>Description</label> <input type="text" name="description" value="<?php if(isset($roledata)): ?> <?php echo e($roledata->description); ?> <?php endif; ?>" placeholder="Enter Description" class="form-control" required></div>
                                    <div>
                                    <button class="ladda-button btn btn-primary pull-right" data-style="slide-right">Save</button>                               
                                    </div>                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Assign Permissions</h5>
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
                        <table class="table table-striped table-bordered table-hover dataTables-roles" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" id="check-all" value=""></label></div></th>
                                    <th>Display Name</th>
                                    <th>Description</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                             <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                       <?php
                                            $checked = '';
                                       ?> 

                                       <?php if(count($permission->getRoles) > 0): ?>
                                            <?php $__currentLoopData = $permission->getRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($roledata)): ?>
                                                    <?php if($roles->role_id == $roledata->id): ?>
                                                        <?php
                                                             $checked = 'checked';
                                                        ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <div class="i-checks"><label> <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>" <?php echo e($checked); ?>></label></div>
                                       <?php else: ?>
                                       <div class="i-checks"><label> <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>"></label></div>
                                       <?php endif; ?> 
                                    </td>
                                    <td style="color:#1ab394;"><?php echo e($permission->display_name); ?></td>
                                    <td><?php echo e($permission->description); ?></td>
                                </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                             
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" id="check-all" value=""></label></div></th>
                                    <th>Display Name</th>
                                    <th>Description</th>                                    
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>                
            </div>
            </form>
       </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
<script>
        $(document).ready(function(){
            $("#check-all").on("ifUnchecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("uncheck");
            });

            $("#check-all").on("ifChecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("check");
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>