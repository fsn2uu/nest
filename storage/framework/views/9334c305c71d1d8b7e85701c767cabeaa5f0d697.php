<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>Add a Company</h1>

            <form action="<?php echo e(route('cysy.companies.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <?php echo $__env->make('cysy.companies._parts.baseForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <input type="submit" value="Create Company" class="button is-success">
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>