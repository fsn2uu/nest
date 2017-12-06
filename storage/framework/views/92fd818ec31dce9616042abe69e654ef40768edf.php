<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Complexes
                    </h1>
                </div>
                <div class="level-right">
                    <a href="<?php echo e(route('managers.complexes.create')); ?>" class="button is-primary">Add a Complex</a>
                </div>
            </div>
            <?php if($complexes->count() < 1): ?>
                <h3>You don't have any complexes yet!</h3>
            <?php else: ?>
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Unit Count</th>
                            <th>Phone</th>
                            <th>Phone 2</th>
                            <th>Website</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $complexes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('managers.complexes.show', $complex->id)); ?>">
                                    <?php echo e($complex->name); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.complexes.show', $complex->id)); ?>">
                                    <?php echo e($complex->units->count()); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.complexes.show', $complex->id)); ?>">
                                    <?php echo e($complex->phone); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.complexes.show', $complex->id)); ?>">
                                    <?php echo e($complex->phone2); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.complexes.show', $complex->id)); ?>">
                                    <?php echo e($complex->url); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>