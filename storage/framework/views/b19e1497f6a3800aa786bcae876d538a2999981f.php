<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>Okay, tell us about your company</h1>
            <p>We need to get your company set up.  Hang in there, we're almost done.</p>
            <form action="<?php echo e(route('list.step.three')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                
                <input type="hidden" name="user_name" value="<?php echo e(\Request::get('name')); ?>">
                <input type="hidden" name="user_email" value="<?php echo e(\Request::get('email')); ?>">
                <input type="hidden" name="user_password" value="<?php echo e(\Request::get('password')); ?>">
                <input type="hidden" name="plan_id" value="<?php echo e(\Request::get('plan_id')); ?>">

                <?php echo $__env->make('cysy.companies._parts.baseForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <input type="submit" value="Next Step" class="button is-success">
            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>