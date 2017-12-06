<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>New Complex</h1>

            <form action="<?php echo e(route('managers.complexes.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <?php echo $__env->make('managers.complexes._parts.baseForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <?php echo $__env->make('managers.complexes._parts.amenities', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <input type="submit" class="button is-success" value="Create Complex">
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('js/inputmask/inputmask.js')); ?>"></script>
    <script src="<?php echo e(asset('js/inputmask/inputmask.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/inputmask/inputmask.numeric.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/inputmask/inputmask.date.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/inputmask/inputmask.phone.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('js/inputmask/jquery.inputmask.js')); ?>"></script>

    <script>
        $(window).load(function()
        {
           var phones = [{ "mask": "(###) ###-####"}];
            $('#phone, #phone2').inputmask({
                mask: phones,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>