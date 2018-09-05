<!DOCTYPE html>
<html>

@include("includes.header")

<body class="fixed-navigation">

   <div id="loading" >
     <div class="sk-spinner sk-spinner-rotating-plane loader" ></div>
   </div>
                                       
 
    <div id="wrapper" class="animated fadeInRight">
    
        @include("includes.sidebar")

        <div id="page-wrapper" class="gray-bg ">
        <div class="row border-bottom">
        
            @include("includes.header_nav")
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>{{ isset($sub_breadcrumb)?$sub_breadcrumb:$breadcrumb }}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ url('/home') }}">Home</a>
                        </li>
                        
                        <li @if(isset($sub_breadcrumb)) class="" @else class="active" @endif>
                        @if(!isset($sub_breadcrumb)) <strong> @endif {{ $breadcrumb }} @if(!isset($sub_breadcrumb)) </strong> @endif
                        </li>

                        <li @if(isset($sub_breadcrumb)) class="active" @endif>
                        @if(isset($sub_breadcrumb)) <strong> @endif {{ isset($sub_breadcrumb)?$sub_breadcrumb:"" }} @if(isset($sub_breadcrumb)) </strong> @endif
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            @include('includes.alert')

            @yield('content')

                <div class="footer">
                    
                    <div>
                        <strong>Copyright</strong> FolioAvenue &copy; 2018
                    </div>
                </div>

              </div>
        
        </div>
    </div>
   
   @include("includes.footer") 
    
   @yield("custom_js")
</body>

</html>

