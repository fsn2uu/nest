<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Rate Schedules
                    </h1>
                </div>

                <div class="level-right">
                    <a href="<?php echo e(route('managers.rates.create')); ?>" class="button is-primary">Add a Rate Schedule</a>
                </div>
            </div>

            <?php if($schedules->count() < 1): ?>
                <h3>You have no rate schedules!</h3>
            <?php else: ?>
                <table class="table is-hoverable">
                    <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('managers.rates.show', $r->id)); ?>"><?php echo e($r->name); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>