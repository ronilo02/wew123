<?php $__env->startSection('content'); ?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="file-manager">                     
                       
                        <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#upload_file">Upload Files</button>
                        
                        
                        <div class="hr-line-dashed"></div>
                        <h5>Folders</h5>
                        <ul class="folder-list" style="padding: 0">
                            <li ><a href="<?php echo e(url('/files')); ?>" style="color:#1ab394"><i class="fa fa-folder" style="color:#1ab394"></i> Agreement Form</a></li>
                            <li><a href="<?php echo e(url('/files/proposals')); ?>" ><i class="fa fa-folder"></i> Proposals</a></li>
                            <li><a href="<?php echo e(url('/files/other-files')); ?>"><i class="fa fa-folder"></i> Other Files</a></li>
                        </ul>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>
                                    <?php if(in_array($file->mime_type,$mime_type)): ?>
                                        <div class="image">
                                                <img alt="image" class="img-responsive" src="<?php echo e(asset('storage/files/pfile/'.$file->orig_name)); ?>">
                                        </div>
                                    <?php else: ?>
                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="file-name">
                                        <?php echo e(ucfirst($file->name)); ?>

                                        <br/>
                                        <small>Uploaded: <?php echo e(\Carbon\Carbon::parse($file->created_at)->format('M d,Y')); ?> </small>
                                        <br>
                                        <br>
                                        <form role="form" action="<?php echo e(url('files/download')); ?>" id="edit-lead-form" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="file" value="<?php echo e($file->orig_name); ?>"> 
                                            <input type="hidden" name="mime_type" value="<?php echo e($file->mime_type); ?>"> 
                                            <input type="hidden" name="name" value="<?php echo e($file->name); ?>"> 
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-xs btn-primary btn-block" > <i class="fa fa-download "></i> Download</button>
                                        </form>   
                                    </div>
                                </a>
                            </div>
                        </div>        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                </div>
            </div>
        </div>
    </div>
    <form role="form" action="<?php echo e(url('files')); ?>" id="edit-lead-form" method="POST" enctype="multipart/form-data">
        <!-- <input type="hidden" name="_method" value="PUT"> -->
    <?php echo csrf_field(); ?>
    <div class="modal inmodal" id="upload_file" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Upload Files</h4>
                        <small class="font-bold" style="color:#1ab394">*After editing this note it's advisable to notify the sale assigned on this author</small> 
                </div>
                <div class="modal-body">
                        <div class="form-group"><label>Name</label> <input type="text" name="name"  placeholder="Enter File Name" class="form-control" required="required"></div>
                        <div class="form-group"><label>File</label> <input type="file" name="file"  placeholder="Enter Subject" class="form-control" ></div>
                        <div class="form-group">
                            <label>Folder Category</label>
                            <select name="file_cat" id="file_cat" class="form-control">
                                <?php $__currentLoopData = $file_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($key); ?>"><?php echo e($val); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Save changes</button>
                </div>
                </div>
            </div>
    </div>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script>
        $(document).ready(function(){
            //Keyboard shortcuts for creating notes
            Mousetrap.bind('U', function(){
                        $('#upload_file').modal('toggle');
                  });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>