<a href="/leads">
    <div>
        <i class="fa fa-envelope fa-fw"></i> <?php echo e($notification->data['message']); ?>

        <span class="pull-right text-muted small"><?php echo e($notification->created_at->diffForHumans()); ?></span>
    </div>
</a>