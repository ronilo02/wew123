@extends('layouts.master')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
       <form role="form" id="uploadForm" action="{{ url('leads/upload') }}" method="POST" enctype="multipart/form-data">
           @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><i class="fa fa-upload" style="color:#1ab394"></i> Import Leads</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">                       
                            <div class="col-sm-11">
                            
                                        <div class="form-group" >
                                           
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-file"></i></span><input type="file" class="form-control" name="leads" id="leads" value="" required>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-1">
                                    <div>
                                        <button  class="ladda-button btn btn-primary pull-right" data-style="slide-right" id="upload-leads"><i class="fa fa-upload"></i> Upload</button>
                                    </div>
                                </div>                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            
                            <div id="progress-div"><div id="progress-bar"></div></div>
                                 
                            </div>
                        </div>                        
                    </div>
                </div>               
            </div>
         </div>
       </form>    
       
    <div id="targetLayer"></div>
                  
    </div>


   
@endsection

@section('custom_js')   
   <script>
         $(document).ready(function() { 
            $("#progress-bar").hide();
            $('#uploadForm').submit(function(e) {	
                if($('#leads').val()) {
                    
                    e.preventDefault();
                   
                    $(this).ajaxSubmit({ 
                        target:   '#targetLayer', 
                        beforeSubmit: function() {
                           
                            $("#progress-bar").show();
                            $("#progress-bar").width('0%');
                        },
                        uploadProgress: function (event, position, total, percentComplete){	
                            $("#progress-bar").width(percentComplete + '%');
                            $("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
                        },
                        success:function (result){
                            
                           $('#lead-import-leads').html(result);
                        },
                        resetForm: true 
                    }); 
                    return false; 
                }
            });
        });
   </script>
@endsection