<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo e(asset('storage/files/users/'.auth()->user()->avatar)); ?>" width="70px" height="70px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo e(auth()->user()->fullname()); ?></strong>
                             </span> <span class="text-muted text-xs block"><?php echo e(auth()->user()->getRoles[0]->getRole->name); ?> <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?php echo e(url('/profile')); ?>">Profile</a></li>
                            <li><a href="<?php echo e(url('/user/'.auth()->user()->id.'/edit')); ?>">Edit</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        CRM
                    </div>
                </li>

                <?php
                    $dashboard="";
                    $leads="";
                    $accounts="";
                    $permission="";
                    $role="";
                    $payments="";
                    $reports="";
                    $migration="";
                    $quota = "";
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
                ?>

                

                <li class = <?php echo e($dashboard); ?>>
                    <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>                  
                </li>
               
                    <li class = <?php echo e($leads); ?>>
                        <a href="#"><i class="fa fa-child"></i> <span class="nav-label">Leads</span><span class="fa arrow"></span></a>                  
                        <ul class="nav nav-second-level collapse">
                            <?php if(auth()->user()->hasRole(['superadmin','lead.researcher','administrator','fulfillment'])): ?>
                                <li><a href="<?php echo e(url('leads')); ?>">All</a></li>
                            <?php endif; ?>    
                        <li><a href="<?php echo e(url('/leads/bucket-lists')); ?>">Bucket Lists</a></li>
                            <?php if(auth()->user()->hasRole(['superadmin','lead.researcher'])): ?>
                                <li><a href="<?php echo e(url('leads/create')); ?>">Add New Lead</a></li>
                                <li><a href="<?php echo e(url('leads/import')); ?>">Import</a></li>
                                <li><a href="#">Export</a></li>
                             <?php endif; ?>
                        </ul>
                    </li>
                    <?php if(auth()->user()->hasRole(['superadmin'])): ?>
                        <li class = <?php echo e($migration); ?>>
                            <a href="#"><i class="fa fa-upload"></i> <span class="nav-label">Migration</span><span class="fa arrow"></span></a>                  
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?php echo e(url('migration/import')); ?>">Import</a></li>
                            
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php if(auth()->user()->hasRole(['superadmin','administrator'])): ?>
                    
                    <li class = <?php echo e($accounts); ?>>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Accounts</span><span class="fa arrow"></span></a>                  
                        <ul class="nav nav-second-level collapse">
                            <li><a href="<?php echo e(url('/user')); ?>">Lists</a></li>
                            <li><a href="<?php echo e(url('/user/create')); ?>">Add</a></li>                        
                        </ul>              
                    </li>
                    
                    <li class = <?php echo e($quota); ?>>
                            <a href="<?php echo e(url('/quota')); ?>"><i class="fa fa-usd"></i> <span class="nav-label">Quota</span></a>                  
                        </li>
                        <li class = <?php echo e($reports); ?>>
                            <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Reports</span></a>                  
                        </li>
                <?php endif; ?>
                <?php if(auth()->user()->hasRole(['superadmin'])): ?>
               
                <li class = <?php echo e($permission); ?>>
                    <a href="<?php echo e(url('/permission')); ?>"><i class="fa fa-lock"></i> <span class="nav-label">Permissions</span></a>                  
                </li>
             
                <li class = <?php echo e($role); ?>>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Role</span><span class="fa arrow"></span></a>                  
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo e(url('/role')); ?>">Lists</a></li>
                        <li><a href="<?php echo e(url('/role/create')); ?>">Add</a></li>                        
                    </ul>   
                </li>
                <?php endif; ?>
                
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