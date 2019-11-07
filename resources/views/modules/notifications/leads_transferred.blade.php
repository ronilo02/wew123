@if(url()->current() != url('notifications'))  
<li>
@endif      
    <div class="dropdown-messages-box">
        <a href="profile.html" class="pull-left">
            @if(Storage::disk('public')->exists($notification->data['user']['avatar']))    
            <img alt="image" class="img-circle" src="{{ asset('/storage/files/users/'.$notification->data['user']['avatar']) }}" style="width:50px;height:50px;">
            @else 
            <img alt="image" class="img-circle" src="{{ asset('/storage/files/users/avatar.jpg') }}" style="width:40px;height:40px;">
            @endif
        </a>
        <div  @if(url()->current() == url('notifications')) style="padding-left:50px;" @endif>
            <small class="pull-right"><time class="timeago" datetime="{{ $notification->created_at }}">{{ $notification->created_at->diffForhumans() }}</time>  </small>
            <strong> {{ $notification->data['user']['firstname'].' '.$notification->data['user']['lastname'] }} </strong>
            <br>
            {{ $notification->data['message'] }}. <br>
            <small class="text-muted " style="margin-left:80px;">{{ date_format($notification->created_at,'M d,Y h:i A') }}</small>
        </div>
    </div>
@if(url()->current() != url('notifications'))    
</li>
<li class="divider"></li>
@endif 