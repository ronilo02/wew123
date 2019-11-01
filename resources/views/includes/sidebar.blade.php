<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ asset('storage/files/users/'.auth()->user()->avatar) }}" width="70px" height="70px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ auth()->user()->fullname() }}</strong>
                             </span> <span class="text-muted text-xs block">{{ auth()->user()->getRoles[0]->getRole->name }} <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="{{ url('/profile') }}">Profile</a></li>
                            <li><a href="{{ url('/user/'.auth()->user()->id.'/edit')}}">Edit</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CRM
                    </div>
                </li>

                @php

                    $dashboard="";
                    $leads="";
                    $accounts="";
                    $permission="";
                    $role="";
                    $payments="";
                    $reports="";
                    $migration="";
                    $quota = "";
                    $company = "";

                    if(request()->url() == "home"){
                        $dashboard="active";   
                    }elseif(request()->url() == url("leads")){
                        $leads="active";    
                    }elseif(request()->url() == url("accounts")){
                        $accounts="active";
                    }elseif(request()->url() == url("permission")){
                        $permission="active";
                    }elseif(request()->url() == url("role")){
                        $role="active";
                    }elseif(request()->url() == url("company")){
                        $company="active";
                    }elseif(request()->url() == url("payments")){
                        $payments="active";
                    }elseif(request()->url() == url("quota")){
                        $quota="active";
                    }elseif(request()->url() == url("reports")){
                        $reports="active";
                    }
                    elseif(request()->url() == url("migration")){
                        $migration="active";
                    }
                @endphp

                

                <li class = {{ $dashboard }}>
                    <a href="{{ url('/home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>                  
                </li>
               
                    <li class = {{ $leads }}>
                        <a href="#"><i class="fa fa-child"></i> <span class="nav-label">Leads</span><span class="fa arrow"></span></a>                  
                        <ul class="nav nav-second-level collapse">
                            @if(auth()->user()->hasRole(['superadmin','lead.researcher','administrator','fulfillment']))
                                <li><a href="{{ url('leads') }}">All</a></li>
                            @endif    
                        <li><a href="{{ url('/leads/bucket-lists') }}">Bucket Lists</a></li>
                            @if(auth()->user()->hasRole(['superadmin','lead.researcher','administrator']))
                                <li><a href="{{ url('leads/create') }}">Add New Lead</a></li>
                                <li><a href="{{ url('leads/import') }}">Import</a></li>
                                <li><a href="#">Export</a></li>
                             @endif
                        </ul>
                    </li>
                    @if(auth()->user()->hasRole(['superadmin']))
                        <li class = {{ $migration }}>
                            <a href="#"><i class="fa fa-upload"></i> <span class="nav-label">Migration</span><span class="fa arrow"></span></a>                  
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ url('migration/import') }}">Import</a></li>
                            
                            </ul>
                        </li>
                    @endif
                @if(auth()->user()->hasRole(['superadmin','administrator']))
                    
                    <li class = {{ $accounts }}>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Accounts</span><span class="fa arrow"></span></a>                  
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/user') }}">Lists</a></li>
                            <li><a href="{{ url('/user/create') }}">Add</a></li>                        
                        </ul>              
                    </li>
                    <li class = {{ $company }}>
                        <a href="#"><i class="fa fa-building"></i> <span class="nav-label">Company</span><span class="fa arrow"></span></a>                  
                            <ul class="nav nav-second-level collapse">
                                <li><a href="{{ url('/company') }}">Lists</a></li>
                                <li><a href="#">Add</a></li>                        
                            </ul>              
                        </li>
                    
                    <li class = {{ $quota }}>
                            <a href="{{ url('/quota') }}"><i class="fa fa-usd"></i> <span class="nav-label">Quota</span></a>                  
                        </li>
                        <li class = {{ $reports }}>
                            <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Reports</span></a>                  
                        </li>
                @endif
                @if(auth()->user()->hasRole(['superadmin']))
               
                <li class = {{ $permission }}>
                    <a href="{{ url('/permission')}}"><i class="fa fa-lock"></i> <span class="nav-label">Permissions</span></a>                  
                </li>
             
                <li class = {{ $role }}>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Role</span><span class="fa arrow"></span></a>                  
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ url('/role') }}">Lists</a></li>
                        <li><a href="{{ url('/role/create') }}">Add</a></li>                        
                    </ul>   
                </li>
                @endif
                
                <!--<li>
                    <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="basic_gallery.html">Lightbox Gallery</a></li>
                        <li><a href="slick_carousel.html">Slick Carousel</a></li>
                        <li><a href="carousel.html">Bootstrap Carousel</a></li>

                    </ul>
                </li>/-->
                
            </ul>

        </div>
    </nav>