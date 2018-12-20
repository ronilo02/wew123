<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content animated fadeInRight">
       <form role="form" id="uploadForm" action="<?php echo e(url('migration/upload')); ?>" method="POST" enctype="multipart/form-data">
           <?php echo csrf_field(); ?>
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
                                                <span class="input-group-addon"><i class="fa fa-file"></i></span><input type="file" class="form-control" name="leads" id="leads" value="">
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-1">
                                    <div>
                                        <button  class="ladda-button btn btn-primary pull-right" data-style="slide-right" id="upload-leads"><i class="fa fa-upload" type="submit"></i> Upload</button>
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


   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>