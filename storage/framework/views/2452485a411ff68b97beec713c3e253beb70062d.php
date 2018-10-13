<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php if($results): ?>


                                    <?php $__currentLoopData = $results->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                    <td><?php echo e($result->id); ?></td>
                                    <td><?php echo e($result->name); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <?php else: ?>
                                    <h4 class="alert alert-info">No data</h4>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        $("#doctor").change(function(){
            $("#job_title").removeClass("hidden");
            $("#orgnization").removeClass("hidden");


        });
        $("#patient").change(function(){
            $("#job_title").addClass("hidden");
            $("#orgnization").addClass("hidden");


        });
        /*$("#doctor").onclick(function(){

            $("#patient").removeAttr("checked")
        });*/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>