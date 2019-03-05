   <!-- Mainly scripts -->
   {{-- <!-- <script src="{{ asset('inspinia_admin/js/jquery-2.1.1.js') }}"></script> -->
   
   <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> --> --}}
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script> -->
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('inspinia_admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    
    
    <!-- Flot -->
    <script src="{{ asset('inspinia_admin/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/flot/jquery.flot.spline.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/flot/curvedLines.js') }}"></script>

    <!-- Peity -->
    <script src="{{ asset('inspinia_admin/js/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/demo/peity-demo.js') }}"></script>

    <!-- Custom and plugin javascript -->   
    <script src="{{ asset('inspinia_admin/js/inspinia.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/pace/pace.min.js') }}"></script>
  <!-- DROPZONE -->
  <script src="{{ asset('inspinia_admin/js/plugins/dropzone/dropzone.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('inspinia_admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!--Datatables -->
    <script src="{{ asset('inspinia_admin/js/plugins/dataTables/datatables.min.js') }}"></script>
    
    <!-- Jvectormap -->
    <script src="{{ asset('inspinia_admin/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('inspinia_admin/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Sparkline demo data  -->
    {{-- <!-- <script src="{{ asset('inspinia_admin/js/demo/sparkline-demo.js') }}"></script> --> --}}

    <!-- ChartJS-->
    <script src="{{ asset('inspinia_admin/js/plugins/chartJs/Chart.min.js') }}"></script>

   <!-- Data picker -->
   <script src="{{ asset('inspinia_admin/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <!-- Ladda -->
    <script src="{{ asset('inspinia_admin/js/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('inspinia_admin/js/plugins/ladda/ladda.jquery.min.js') }}"></script>

      <!-- Input Mask-->
      <script src="{{ asset('inspinia_admin/js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>
    
     <!-- Tinycon -->
     <script src="{{ asset('inspinia_admin/js/plugins/tinycon/tinycon.min.js') }}"></script>

      <!-- Sweet alert -->
    <script src="{{ asset('inspinia_admin/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

     <!-- iCheck -->
     <script src="{{ asset('inspinia_admin/js/plugins/iCheck/icheck.min.js') }}"></script>    
     <script src="{{ asset('js/timeAgo.min.js') }}"></script>

     <script src="{{ asset('vendor/upload-progress-bar/js/upload.js') }}"></script>
     <script src="{{ asset('vendor/cleave/cleave.min.js') }}"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>   
     <script src="https://craig.global.ssl.fastly.net/js/mousetrap/mousetrap.min.js?a4098"></script>
     
     <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
     <script src="{{ asset('js/custom.js') }}"></script>   
     
     <script src="{{ asset('vendor/number/jquery.number.js') }}"></script>
  
    
     <script src="http://malsup.github.com/jquery.form.js"></script> 
     <script>
            $(document).ready(function () {
               
                $("time.timeago").timeago();
               
                $('input[type=checkbox]').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
                
                
            $('#quota').number( true, 2 );
       
                
            });
    </script>
     
    <!-- Custom Js -->
   
    <script type="text/javascript">
        $(window).on('load', function () {                
                $("#loading").hide("fade");
                
        });
    </script>
    

    
  
   
   