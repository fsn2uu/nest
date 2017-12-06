<?php $__env->startSection('content'); ?>

    <h1><?php echo e($schedule->name); ?></h1>

    <form action="<?php echo e(route('admin.rates.update', $schedule->id)); ?>" method="post">
        <input type="hidden" name="_method" value="put">
        <?php echo e(csrf_field()); ?>


        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($schedule->name); ?>" required>
            <small class="form-text text-muted">
              Rate schedule names are not visible to travelers.
            </small>
        </div>
        <h3>Rates</h3>
        <small class="form-text text-muted">
            Don't add dollar signs to rates; they will be automatically added later.
        </small>
        <?php $i = 0; ?>
        <?php $__currentLoopData = $schedule->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row input-rows">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="old_rates[<?php echo e($r->id); ?>][name]" class="form-control" value="<?php echo e($r->name); ?>">
                </div>
                <div class="col">
                    <label for="">Start Date</label>
                    <input type="text" name="old_rates[<?php echo e($r->id); ?>][start]" class="form-control datepicker" value="<?php echo e(\Carbon\Carbon::parse($r->start)->format('m-d-Y')); ?>">
                </div>
                <div class="col">
                    <label for="">End Date</label>
                    <input type="text" name="old_rates[<?php echo e($r->id); ?>][end]" class="form-control datepicker" value="<?php echo e(\Carbon\Carbon::parse($r->end)->format('m-d-Y')); ?>">
                </div>
                <div class="col">
                    <label for="">Daily Rate</label>
                    <input type="text" name="old_rates[<?php echo e($r->id); ?>][daily]" class="form-control" value="<?php echo e($r->daily); ?>">
                </div>
                <div class="col">
                    <label for="">Weekly Rate</label>
                    <input type="text" name="old_rates[<?php echo e($r->id); ?>][weekly]" class="form-control" value="<?php echo e($r->weekly); ?>">
                </div>
            </div>
            <?php $i++; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="form-group" style="margin-top: 15px;" id="appendTarget">
            <a href="#" class="btn btn-lg btn-success" id="appender" alt="Add a New Row" title="Add a New Row"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
        </div>

        <input type="submit" value="Update Schedule" class="btn btn-primary">
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>