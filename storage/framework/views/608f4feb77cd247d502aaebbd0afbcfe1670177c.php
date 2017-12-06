<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Units
                    </h1>
                </div>
                <div class="level-right">
                    <a href="<?php echo e(route('managers.units.create')); ?>" class="button is-primary">Add a Unit</a>
                </div>
            </div>

            <?php if($units->count() < 1): ?>
                <h3>You don't have any units yet!</h3>
            <?php else: ?>
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>Unit Name</th>
                            <th>Complex Name</th>
                            <th>Unit Number</th>
                            <th>Date Listed</th>
                            <th>Last Modified</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>"><?php echo e(ucwords(@$unit->name)); ?></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>"><?php echo e(ucwords(@$unit->complex->name)); ?></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>"><?php echo e(ucwords(@$unit->unit_no)); ?></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>"><?php echo e(ucwords($unit->created_at->format('m-d-Y'))); ?></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>"><?php echo e(ucwords($unit->updated_at->format('m-d-Y'))); ?></a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>"><?php echo e(ucwords($unit->status)); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>