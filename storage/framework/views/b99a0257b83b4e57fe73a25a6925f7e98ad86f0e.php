<?php if(url()->current() != url('notifications')): ?>  
<li>
<?php endif; ?>      
    <div class="dropdown-messages-box">
        <a href="profile.html" class="pull-left">
            <?php if(Storage::disk('public')->exists($notification->data['user']['avatar'])): ?>    
            <img alt="image" class="img-circle" src="<?php echo e(asset('/storage/files/users/'.$notification->data['user']['avatar'])); ?>" style="width:50px;height:50px;">
            <?php else: ?> 
            <img alt="image" class="img-circle" src="<?php echo e(asset('/storage/files/users/avatar.jpg')); ?>" style="width:40px;height:40px;">
            <?php endif; ?>
        </a>
        <div  <?php if(url()->current() == url('notifications')): ?> style="padding-left:50px;" <?php endif; ?>>
            <small class="pull-right"><time class="timeago" datetime="<?php echo e($notification->created_at); ?>"><?php echo e($notification->created_at->diffForhumans()); ?></time>  </small>
            <strong> <?php echo e($notification->data['user']['firstname'].' '.$notification->data['user']['lastname']); ?> </strong>
            <br>
            <?php echo e($notification->data['message']); ?>. <br>
            <small class="text-muted " style="margin-left:80px;"><?php echo e(date_format($notification->created_at,'M d,Y h:i A')); ?></small>
        </div>
    </div>
<?php if(url()->current() != url('notifications')): ?>    
</li>
<li class="divider"></li>
<?php endif; ?> 