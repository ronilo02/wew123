<!DOCTYPE html>
<html>

<?php echo $__env->make("includes.header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="fixed-navigation">

   <div id="loading" >
     <div class="sk-spinner sk-spinner-rotating-plane loader" ></div>
   </div>
                                       
 
    <div id="wrapper" class="animated fadeInRight">
    
        <?php echo $__env->make("includes.sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div id="page-wrapper" class="gray-bg ">
        <div class="row border-bottom">
        
            <?php echo $__env->make("includes.header_nav", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?php echo e(isset($sub_breadcrumb)?$sub_breadcrumb:$breadcrumb); ?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        
                        <li <?php if(isset($sub_breadcrumb)): ?> class="" <?php else: ?> class="active" <?php endif; ?>>
                        <?php if(!isset($sub_breadcrumb)): ?> <strong> <?php endif; ?> <?php echo e($breadcrumb); ?> <?php if(!isset($sub_breadcrumb)): ?> </strong> <?php endif; ?>
                        </li>

                        <li <?php if(isset($sub_breadcrumb)): ?> class="active" <?php endif; ?>>
                        <?php if(isset($sub_breadcrumb)): ?> <strong> <?php endif; ?> <?php echo e(isset($sub_breadcrumb)?$sub_breadcrumb:""); ?> <?php if(isset($sub_breadcrumb)): ?> </strong> <?php endif; ?>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <?php echo $__env->make('includes.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>

                <div class="footer">
                    
                    <div>
                        <strong>Copyright</strong> FolioAvenue &copy; 2018
                    </div>
                </div>

              </div>
        
        </div>
    </div>
   
   <?php echo $__env->make("includes.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    
   <?php echo $__env->yieldContent("custom_js"); ?>
</body>

</html>

