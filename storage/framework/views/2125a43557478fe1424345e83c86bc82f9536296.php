<?php if($errors->any()): ?>
    <div class="modal inmodal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    
                    <div class="modal-body" style="background-color:#9a33a6;color:white">
                      <?php if($errors->has('username')): ?>  
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <i class="fa fa-exclamation-circle fa-lg"></i><strong> <?php echo e($error); ?></strong>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php elseif($errors->has('deactivated')): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <i class="fa fa-lock"></i><strong> <?php echo e($error); ?></strong>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>  
                    </div>
                    
                </div>
            </div>
    </div>
<?php endif; ?>