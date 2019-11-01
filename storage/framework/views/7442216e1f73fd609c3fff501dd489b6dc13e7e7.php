<?php if($message = session('message')): ?>
    <br>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            <strong>Success!</strong> <?php echo e($message); ?>        
       
    </div>
<?php elseif($error_message = session('error_message')): ?>
<br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            <strong>Error!</strong> <?php echo e($error_message); ?>        
        
    </div>
<?php elseif($error_leads = session('error_leads')): ?>
        <br>
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            <?php for($i = 0;$i <= count($error_leads)-1;$i++): ?>
                <ul>
                    <li>
                        <strong>Error!</strong> <?php echo e($error_leads[$i]['name'].' has '); ?> <strong> <?php echo e($error_leads[$i]['leads']); ?> </strong> leads
                    </li>
                </ul>

            <?php endfor; ?>
</div>
<?php elseif($errors->any()): ?>
    <br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">x</span>
            </button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <ul>
                    <li>
                        <strong>Error!</strong> <?php echo e($error); ?>  
                    </li>
                </ul>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>