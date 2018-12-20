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
<?php endif; ?>