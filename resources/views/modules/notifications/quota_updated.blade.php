@if(url()->current() != url('notifications'))  
<li>
@endif      
    <div class="dropdown-messages-box">
        <a href="profile.html" class="pull-left">
        <img alt="image" class="img-circle" src="storage/files/users/{{ $notification->data['user']['avatar'] }}" style="width:50px;height:50px;">
        </a>
        <div  @if(url()->current() == url('notifications')) style="padding-left:50px;" @endif>
            <small class="pull-right"><time class="timeago" datetime="{{ $notification->created_at }}">{{ $notification->created_at->diffForhumans() }}</time>  </small>
            <strong> {{ $notification->data['user']['firstname'].' '.$notification->data['user']['lastname'] }} </strong>{{ $notification->data['message'] }}. <br>
            <small class="text-muted " >{{ date_format($notification->created_at,'M d,Y h:i A') }}</small>
        </div>
    </div>
@if(url()->current() != url('notifications'))    
</li>
<li class="divider"></li>
@endif 