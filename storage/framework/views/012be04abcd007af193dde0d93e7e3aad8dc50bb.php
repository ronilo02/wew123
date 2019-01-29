<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Bucket List </h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>                           
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12 ">
                                    <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover " id="dataTables-bucket-list">
                                                <thead>
                                                    <tr>
                                                      
                                                        <th>Author</th>
                                                        <th>Book Title</th>
                                                        <th>Publisher</th>            
                                                        <th>Home Phone</th> 
                                                        <th>office Phone</th>                
                                                        <th>Genre</th>
                                                        <th>Status</th>
                                                        <th>Assigned</th>
                                                        <th>Researcher</th>
                                                                                           
                                                    </tr>
                                                </thead>
                                                <tbody >
                                                <?php $__currentLoopData = $bucket_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                    
                                                    <td ><a href="<?php echo e(url('leads/'.$b->id.'/profile')); ?>" style="color:#1ab394;"><?php echo e($b->fullname()); ?> </a></td>
                                                    <td><?php echo e($b->getBookInformation->book_title); ?></td>
                                                    <td><?php echo e($b->getBookInformation->getPublisher == null? " ":$b->getBookInformation->getPublisher['name']); ?></td>
                                                    <td><?php echo e($b->home_phone); ?></td>
                                                    <td><?php echo e($b->office_phone); ?></td>
                                                    <td><?php echo e($b->getBookInformation->genre); ?></td>
                                                    <td><?php echo e($b->getStatus->name); ?></td>
                                                    <td><?php echo e($b->getAssignee == null ? "" : $b->getAssignee->fullname()); ?></td>
                                                    <td><?php echo e($b->getResearcher->fullname()); ?></td>
                                                    
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                                </tbody>
                                                <tfoot>
                                                    <tr>   
                                                                                 
                                                        <th>Author</th>
                                                        <th>Book Title</th>
                                                        <th>Publisher</th>  
                                                        <th>Home Phone</th> 
                                                        <th>office Phone</th>           
                                                        <th>Genre</th>
                                                        <th>Status</th>
                                                        <th>Assigned</th>
                                                        <th>Researcher</th>
                                                        <?php if(auth()->user()->hasRole(['administrator','lead.researcher'])): ?>
                                                      
                                                        <?php endif; ?>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
           
     
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom_js'); ?>
    <script>
        $(document).ready(function() {
            
        var table = $('#dataTables-bucket-list').DataTable({   
            orderCellsTop: true,
            fixedHeader: true,      
            pageLength: 10,
            responsive: true,
            ordering: false,
            drawCallback: function() {
                $('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_square-green'
                });
            },
            columnDefs: [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true,
                    'selectCallback': function(nodes, selected) {
                        $('input[type="checkbox"]', nodes).iCheck('update');
                    },
                    'selectAllCallback': function(nodes, selected, indeterminate) {
                        $('input[type="checkbox"]', nodes).iCheck('update');
                    }
                }
            }],
            select: 'multi',

            });
            // Setup - add a text input to each footer cell
            $('#dataTables-bucket-list thead tr').clone(true).appendTo( '#dataTables-bucket-list thead' );
            $('#dataTables-bucket-list thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" class="form-control" style="width:100%;font-size:10px;" placeholder="Search '+title+'" />' );
        
                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        
         

            
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>