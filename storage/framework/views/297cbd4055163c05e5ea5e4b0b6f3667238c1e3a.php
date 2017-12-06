<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>Settings</h1>
            <ul>
                <li>TODO</li>
                <li>Build functionality to change plans</li>
                <li>add ability to cancel subscription</li>
                <li>add ability to update cc info</li>
                <li>add settings
                    <ul>
                        <li>do they want to auto-accept or manually approve reservations</li>
                        <li>age restriction level</li>
                        <li>travelers insurance?</li>
                        <li>security deposit?</li>
                    </ul>
                </li>
            </ul>
            <h3>Nest Subscription Settings</h3>
            <form action="">
                <?php echo e(csrf_field()); ?>

                <div class="select">
                    <select name="plan_id" id="plan_id">
                        <option value="">Select a Plan</option>
                        <?php $__currentLoopData = $plans->data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(in_array($plan->id, ['nest-1', 'nest-2', 'nest-3'])): ?>
                                <option value="<?php echo e($plan->id); ?>"
                                    <?php echo e($cplan == $plan->id ? 'selected' : ''); ?>

                                    ><?php echo e($plan->name); ?></option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>