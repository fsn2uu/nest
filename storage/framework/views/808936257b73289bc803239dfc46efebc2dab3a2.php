<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>
                Edit <?php echo e($user->name); ?>

            </h1>
            <form action="<?php echo e(route('managers.users.store')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <?php echo $__env->make('managers.users._parts.baseForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <input type="submit" value="Update User" class="button is-success">
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>