<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1><?php echo e($schedule->name); ?></h1>

            <form action="<?php echo e(route('managers.rates.update', $schedule->id)); ?>" method="post">
                <input type="hidden" name="_method" value="put">
                <?php echo e(csrf_field()); ?>


                <div class="field">
                    <label class="label" for="name">Name</label>
                    <input type="text" name="name" id="name" class="input" value="<?php echo e($schedule->name); ?>" required>
                    <p class="help">
                        Rate schedule names are not visible to travelers.
                    </p>
                </div>
                <h3>Rates</h3>
                <p class="help">
                    Don't add dollar signs to rates; they will be automatically added later.
                </p>
                <?php $i = 0; ?>
                <?php $__currentLoopData = $schedule->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="columns">
                        <div class="column">
                            <label class="label" for="">Name</label>
                            <input type="text" name="old_rates[<?php echo e($r->id); ?>][name]" class="input" value="<?php echo e($r->name); ?>">
                        </div>
                        <div class="column">
                            <label class="label" for="">Start Date</label>
                            <input type="text" name="old_rates[<?php echo e($r->id); ?>][start]" class="input datepicker" value="<?php echo e(\Carbon\Carbon::parse($r->start)->format('m-d-Y')); ?>">
                        </div>
                        <div class="column">
                            <label class="label" for="">End Date</label>
                            <input type="text" name="old_rates[<?php echo e($r->id); ?>][end]" class="input datepicker" value="<?php echo e(\Carbon\Carbon::parse($r->end)->format('m-d-Y')); ?>">
                        </div>
                        <div class="column">
                            <label class="label" for="">Daily Rate</label>
                            <input type="text" name="old_rates[<?php echo e($r->id); ?>][daily]" class="input" value="<?php echo e($r->daily); ?>">
                        </div>
                        <div class="column">
                            <label class="label" for="">Weekly Rate</label>
                            <input type="text" name="old_rates[<?php echo e($r->id); ?>][weekly]" class="input" value="<?php echo e($r->weekly); ?>">
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="field" id="app2">
                    <a class="button is-large is-success" id="appender" v-on:click="testMessage" alt="Add a New Row" title="Add a New Row"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                </div>

                <input type="submit" value="Update Schedule" class="button is-primary">
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        var app = new Vue({
            el: '#app2',
            methods: {
                testMessage: function()
                {
                    alert('hello')
                }
            }
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>