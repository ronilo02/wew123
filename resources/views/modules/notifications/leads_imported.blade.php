<a href="/leads">
    <div>
        <i class="fa fa-envelope fa-fw"></i> {{ $notification->data['message'] }}
        <span class="pull-right text-muted small">{{ $notification->created_at->diffForHumans() }}</span>
    </div>
</a>