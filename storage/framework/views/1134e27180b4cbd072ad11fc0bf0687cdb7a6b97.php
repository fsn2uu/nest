<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>Edit Unit</h1>

            <form action="<?php echo e(route('managers.units.update', $unit->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>

                <div class="columns">
                    <div class="column is-three-quarters">
                        <?php echo $__env->make('managers.units._parts.basicForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>

                    <div class="column is-one-quarter">
                        <h4>Actions</h4>
                        <div class="field">
                            <label for="status" class="label">Status</label>
                            <p class="control">
                                <select name="status" id="status" class="select is-fullwidth">
                                    <option <?php echo e(isset($unit) && $unit->status == 'published' ? 'selected' : ''); ?> value="published">Published</option>
                                    <option <?php echo e(isset($unit) && $unit->status == 'draft' ? 'selected' : ''); ?><?php echo e(!isset($unit) ? 'selected' : ''); ?> value="draft">Draft</option>
                                    <option <?php echo e(isset($unit) && $unit->status == 'inactive' ? 'selected' : ''); ?> value="inactive">Inactive</option>
                                </select>
                                <?php if($errors->has('status')): ?>
                                    <p class="help is-danger">
                                        <?php echo e($errors->first('status')); ?>

                                    </p>
                                <?php endif; ?>
                            </p>
                        </div>

                        <?php echo $__env->make('managers.units._parts.amenities', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        <input type="submit" value="Update Unit" class="button is-success is-fullwidth m-t-15">
                    </div>
                </div>
            </form>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>