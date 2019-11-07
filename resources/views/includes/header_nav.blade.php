<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.6/search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to CRM.</span>
                </li>               
              
                <li class="dropdown">
                        <a class="dropdown-toggle count-info"  @if(url()->current() != url('notifications')) data-toggle="dropdown" @endif href="#">
                            <i class="fa fa-bell"></i>
                            @if (count(Auth::user()->unreadNotifications))
                                <span class="label label-danger">{{ count(Auth::user()->unreadNotifications) }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            @php
                             $i = 0;   
                            @endphp
                                @foreach(Auth::user()->unreadNotifications as $notification)
                                    @include ('modules.notifications.' . snake_case(class_basename($notification->type)))
                                    @php
                                        $i += 1
                                    @endphp 
                                    
                                    @if($i == 5)
                                       @break
                                    @endif
                                @endforeach                      
                            <li>
                                <div class="text-center ">
                                        <a href="/notifications" style="font-size:12px;color:#1ab394;">
                                           See All Notifications
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                </div>
                            </li>
                        </ul>
                    </li>         
                <li>
                    <a href="{{ url('/logout') }}">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>               
            </ul>

        </nav>