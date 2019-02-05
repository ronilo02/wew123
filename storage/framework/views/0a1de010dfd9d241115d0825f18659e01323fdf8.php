<?php if(url()->current() != url('notifications')): ?>  
<li>
<?php endif; ?>      
    <div class="dropdown-messages-box">
        <a href="profile.html" class="pull-left">
        <img alt="image" class="img-circle" src="storage/files/users/<?php echo e($notification->data['user']['avatar']); ?>" style="width:50px;height:50px;">
        </a>
        <div  <?php if(url()->current() == url('notifications')): ?> style="padding-left:50px;" <?php endif; ?>>
            <small class="pull-right"><time class="timeago" datetime="<?php echo e($notification->created_at); ?>"> </time>  </small>
            <strong> <?php echo e($notification->data['user']['firstname'].' '.$notification->data['user']['lastname']); ?> </strong><?php echo e($notification->data['message']); ?>. <br>
            <small class="text-muted " ><?php echo e(date_format($notification->created_at,'M d,Y h:i A')); ?></small>
        </div>
    </div>
<?php if(url()->current() != url('notifications')): ?>    
</li>
<li class="divider"></li>
<?php endif; ?> 