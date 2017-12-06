<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        <?php echo e($complex->name); ?>

                    </h1>
                </div>
                <div class="level-right">
                    <a href="<?php echo e(route('managers.complexes.destroy', $complex->id)); ?>" class="button is-danger m-r-15">Delete Complex</a>
                    <form action="<?php echo e(route('managers.complexes.destroy', $complex->id)); ?>" id="deleteForm">
                        <?php echo e(method_field('delete')); ?>

                    </form>
                    <a href="<?php echo e(route('managers.complexes.edit', $complex->id)); ?>" class="button is-primary m-r-15">Edit Complex</a>
                    <a href="<?php echo e(route('managers.units.create', ['complex_id' => $complex->id])); ?>" class="button is-primary">Add Units</a>
                </div>
            </div>
            <?php $__currentLoopData = $complex->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e(asset($r->filename)); ?>" style="max-height:150px;">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(function(){
            $('.is-danger').on('click', function(e){
                e.preventDefault();

                var conf = confirm('Are you sure?  All information, pictures and units attached to this complex will be deleted.  This cannot be undone.');

                if(conf === true)
                {
                    $('#deleteForm').submit();
                }

                return false;
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>