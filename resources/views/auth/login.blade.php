
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="<?php echo asset('/images/adme.png') ?>">

    <title>APP | Login</title>

    <link href="{{ asset('inspinia_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia_admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('inspinia_admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('inspinia_admin/css/style.css') }}" rel="stylesheet">
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

<body class="gray-bg" style="background-image: url( {{ asset('images/app_bg.jpg') }})">

 {{-- <div id="login-top-video">
    <video autoplay muted loop id="myVideo">
    <source src="{{ asset('video/BG.mp4') }}" type="video/mp4">
    </video>
    </div> --}}

    <div class="middle-box text-center loginscreen animated fadeInDown" stlye="z-index:9999;">
        <div>
            <div>
                
                <h2 class="logo-name" style="margin-left:2%;background-image: url( {{ asset('images/app_bg.jpg') }})">APP</h2>

            </div>
            <h3 style="color:white;">Welcome to AdMe Marketing Services</h3>
            
            <p style="color:white;">Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
             @csrf

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                               <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">
                            </div>
                        </div>

                        <div class="form-group row">
                            

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary btn-block" style="background-image: url({{ asset('images/app_bg.jpg') }});background-position:top center;border:0px;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 ">
                                <div class="checkbox">
                                    <label style="color:white;">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>

            <p class="m-t"> <small style="color:white;">Powered by AdMe Marketing Services &copy; 2018</small> </p>
        </div>
        @include('auth.error_alert')
    </div>
    <!-- Mainly scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('inspinia_admin/js/bootstrap.min.js') }}"></script>
    <script>
      
            $(document).ready(function(){        
                $('#errorModal').modal();                
            }); 
     
    </script>

</body>
</html>
