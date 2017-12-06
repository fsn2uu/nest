<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        <?php echo e($unit->name); ?>

                    </h1>
                </div>

                <div class="level-right">
                    <a href="<?php echo e(route('managers.units.edit', $unit->id)); ?>" class="button is-primary">Edit this Unit</a>
                </div>
            </div>

            <?php if($unit->description): ?>
                <h3>Unit Details</h3>
                <?php echo e(nl2br($unit->description)); ?>

            <?php endif; ?>

            <p>Bedrooms: <?php echo e($unit->beds); ?></p>
            <p>Bathrooms: <?php echo e($unit->baths); ?></p>
            <p>Sleeps: <?php echo e($unit->sleeps); ?></p>

            <?php if($unit->address): ?>
                <h3>Directions</h3>
                <p>
                    <?php echo e($unit->address); ?><?php echo e(($unit->unit_no) ? ' Unit '.$unit->unit_no : ''); ?><br>
                    <?php if($unit->address2): ?>
                        <?php echo e($unit->address2); ?><br>
                    <?php endif; ?>
                    <?php echo e($unit->city); ?>, <?php echo e($unit->state); ?>  <?php echo e($unit->zip); ?>

                </p>
            <?php elseif($unit->complex_id): ?>
                <h3>Directions</h3>
                <p>
                    <?php echo e($unit->complex->address); ?><br>
                    <?php if($unit->complex->address2): ?>
                        <?php echo e($unit->complex->address2); ?><br>
                    <?php endif; ?>
                    <?php echo e($unit->complex->city); ?>, <?php echo e($unit->complex->state); ?>  <?php echo e($unit->complex->zip); ?>

                </p>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>