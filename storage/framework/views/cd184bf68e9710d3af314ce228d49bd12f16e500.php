<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
     <?php if(isset($userdata)): ?>
     <form role="form" action="<?php echo e(url('user/'.$userdata->id)); ?>" id="user-form" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="_method" value="PUT">
     <?php else: ?>
        <form role="form" action="<?php echo e(route('user.store')); ?>" id="user-form" method="POST">
     <?php endif; ?>   
        <?php echo csrf_field(); ?>
         <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create new User </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">User Info</h3>
                                    <p style="color:#1ab394;">*User can change their info dynamically on their profile settings.</p>
                                    <div class="form-group"><label>Firstname</label> <input type="text" name="firstname" value="<?php if(isset($userdata)): ?><?php echo e(ucfirst($userdata->firstname)); ?><?php endif; ?>" placeholder="Enter Firstname" class="form-control" required> </div>
                                    <div class="form-group"><label>Lastname</label> <input type="text" name="lastname" value="<?php if(isset($userdata)): ?><?php echo e(ucfirst($userdata->lastname)); ?><?php endif; ?>" placeholder="Enter Lastname" class="form-control" required></div>
                                    <div class="form-group"><label>Primary Email</label> <input type="email" name="email" value="<?php if(isset($userdata)): ?><?php echo e($userdata->email); ?><?php endif; ?>" placeholder="Enter Primary Email" class="form-control" required></div>
                                    <div class="form-group"><label>Profile Picture</label> <input type="file" name="profile"   class="form-control" ></div>
                                   
                                    <?php if(auth()->user()->hasRole(['superadmin','administrator','lead.researcher'])): ?>   
                                        <h4>Account Status</h4>
                                        <select name="status" id="status" class="form-control" required>                                     
                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($s->id); ?>" <?php if(isset($userdata) && $userdata->status == $s->id): ?> selected="selected" <?php endif; ?>>
                                                        <?php echo e($s->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    <?php endif; ?>
                            </div>

                            <div class="col-sm-6">
                                    <h4>Company Info</h4>
                                    <p style="color:#1ab394;">*Company info can be change if employee is transfered to another company.</p>
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <select name="company" id="company" class="form-control" required>
                                        <option value="0">Select Company</option>
                                            <?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($c->id); ?>" <?php if(isset($userdata) && $userdata->company_id == $c->id): ?> selected="selected" <?php endif; ?>>
                                                        <?php echo e($c->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group" id="branch_ajax">
                                       
                                        <?php if(isset($userdata->branch_id)): ?>
                                         <label>Branch Name</label>                                       
                                        <select name="branch" id="branch" class="form-control" required>
                                                <?php $__currentLoopData = $userdata->company->branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($b->id); ?>" <?php if(isset($userdata) && $userdata->branch_id == $b->id): ?> selected="selected" <?php endif; ?>>
                                                            <?php echo e($b->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php endif; ?>

                                    </div>
                                    <?php if(auth()->user()->hasRole(['superadmin','administrator'])): ?>   
                                        <h4>User Credentials</h4>
                                        <p style="color:#1ab394;">*Updating credentials require to input your current password.</p>
                                        <div class="form-group"><label>Username</label> <input type="text" name="username" value="<?php if(isset($userdata)): ?><?php echo e($userdata->username); ?><?php endif; ?>" placeholder="Enter Username" class="form-control" <?php if(isset($userdata)): ?>disabled <?php else: ?> required <?php endif; ?>></div>
                                        <?php if(isset($userdata)): ?>
                                            <div class="form-group"><label>Current Password</label> <input type="password" name="current-password" placeholder="Enter Current Password" class="form-control" ></div>
                                        <?php endif; ?>

                                        <div class="form-group"><label><?php if(isset($userdata)): ?> New <?php endif; ?> Password</label> <input type="password" name="password" placeholder="Enter <?php if(isset($userdata)): ?> New <?php endif; ?> Password" class="form-control" required></div>
                                        <div class="form-group"><label>Confirm <?php if(isset($userdata)): ?> New <?php endif; ?> Password</label> <input type="password" name="confirm-password" placeholder="Confirm <?php if(isset($userdata)): ?> New <?php endif; ?> Password" class="form-control" required></div>
                                        <div>
                                        <button  class="ladda-button btn btn-primary pull-right" data-style="slide-right" <?php if(auth()->user()->hasRole(['administrator','superadmin','lead.researcher'])): ?> id="submit-user"  type="button" <?php else: ?> type="submit]"  <?php endif; ?> ><?php if(isset($userdata)): ?> Update <?php else: ?> Create <?php endif; ?></button>
                                        </div>
                                    <?php endif; ?>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <?php if(auth()->user()->hasRole(['superadmin','administrator'])): ?>
            <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title"> 
                        <h5>Assign User Role</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-user-role" >
                            <thead>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" value="" id="check-all-roles"></label></div></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>

                                    <?php if(isset($userdata)): ?>
                                        <?php
                                            $checked = '';
                                       ?>   

                                        <?php $__currentLoopData = $userdata->getRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userrole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($role->id ==  $userrole->role_id): ?>
                                                <?php
                                                        $checked = 'checked';
                                                ?>   
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>    
                                       
                                        <div class="i-checks"><label> <input type="checkbox" value="<?php echo e($role->id); ?>" name="roles[]" id="roles" <?php if(isset($userdata)): ?><?php echo e($checked); ?> <?php endif; ?>></label></div></td>
                                    
                                    <td style="color:#1ab394;"><?php echo e($role->display_name); ?></td>
                                    <td><?php echo e($role->description); ?></td>
                                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="width:5%;"><div class="i-checks"><label> <input type="checkbox" value="" id="check-all-roles"></label></div></th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
       </div>
       <?php endif; ?>
       </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
<script>
        $(document).ready(function(){
            $("#check-all-roles").on("ifUnchecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("uncheck");
            });

            $("#check-all-roles").on("ifChecked",function(event){
                 //uncheck all checkboxes
                 $("input[type='checkbox']").iCheck("check");
            });

            $("#submit-user").on("click",function(e){
                var roles = $('input[type=checkbox]');


                if(roles.filter(":checked").length == 0){
                    swal({
                        title: "Missing Inputs",
                        text: "Please assign role to user.",
                        confirmButtonColor: "#1ab394"
                    });
                }else{
                    $("#user-form").submit();
                }
            });

            $("#company").on("change",function(){
                    var id  = $("#company").val();
                    var url = "/branch/getdata";
                     
                    $.ajax({
                            type:"POST",
                            url:url,                              
                            data:{
                            id:id,
                            _token: "<?php echo e(csrf_token()); ?>",       
                            },
                            success:function(result){
                               $("#branch_ajax").html(result);
                            },
                            error:function(error){
                                console.log(error);         
                            }
                            
                    });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>