
<!DOCTYPE html>
<html>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Sep 2016 06:51:39 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>">
    <link rel="icon" type="image/png" href="<?php echo asset('/images/adme.png') ?>">
    <title>APP | Login</title>

    <link href="<?php echo e(asset('inspinia_admin/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('inspinia_admin/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('inspinia_admin/css/animate.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('inspinia_admin/css/style.css')); ?>" rel="stylesheet">
    <style>


        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
        }
        #login-top-video:before {
            content:"";
            position: absolute;
            top:0;
            right:0;
            left:0;
            bottom:0;
            z-index:1;
            background:linear-gradient(to right,rgb(23, 165, 36,0.5),rgb(134, 224, 31,0.3));
       }
       #login-top-video {
        left: 0%;
        top: 0%;
        height: 100vh;
        width: 100%;
        overflow: hidden;
        position: absolute;
        z-index: -1;
        }
     
     </style>
</head>

<body class="gray-bg" style="background-image: url( <?php echo e(asset('images/app_bg.jpg')); ?>)">

 

    <div class="middle-box text-center loginscreen animated fadeInDown" stlye="z-index:9999;">
        <div>
            <div>
                
                <h2 class="logo-name" style="margin-left:2%;background-image: url( <?php echo e(asset('images/app_bg.jpg')); ?>)">APP</h2>

            </div>
            <h3 style="color:white;">Welcome to AdMe Marketing Services</h3>
            
            <p style="color:white;">Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
             <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control<?php echo e($errors->has('username') ? ' is-invalid' : ''); ?>" name="username" value="<?php echo e(old('username')); ?>" required autofocus placeholder="Username">

                                <?php if($errors->has('username')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('username')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required placeholder="Password">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary btn-block" style="background-image: url(<?php echo e(asset('images/app_bg.jpg')); ?>);background-position:top center;border:0px;">
                                    <?php echo e(__('Login')); ?>

                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="checkbox">
                                    <label style="color:white;">
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
            <p class="m-t"> <small style="color:white;">Powered by AdMe Marketing Services &copy; 2018</small> </p>
        </div>
    
    </div>
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.6/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Sep 2016 06:51:39 GMT -->
</html>
