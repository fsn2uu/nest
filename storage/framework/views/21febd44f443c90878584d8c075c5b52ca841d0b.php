<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <?php if($limitreached == 'yes'): ?>
                <h3>
                    Uh oh.
                </h3>
                <p>It looks like you've reached the limit of your plan.  You'll
                need to delete some units or upgrade your plan to continue.</p>
                <p>
                    <a href="<?php echo e(route('managers.settings.index')); ?>" class="button is-large is-success">Upgrade Now</a>
                </p>
            <?php else: ?>
                <h1>New Unit</h1>

                <form action="<?php echo e(route('managers.units.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="columns">
                        <div class="column is-three-quarters">
                            <?php echo $__env->make('managers.units._parts.basicForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>

                        <div class="column is-one-quarter">
                            <h4>Actions</h4>
                            <div class="field">
                                <label for="status" class="label">Status</label>
                                <p class="select is-fullwidth">
                                    <select name="status" id="status" class="select is-fullwidth">
                                        <option value="published">Published</option>
                                        <option value="draft" selected>Draft</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <?php if($errors->has('status')): ?>
                                        <p class="help is-danger">
                                            <?php echo e($errors->first('status')); ?>

                                        </p>
                                    <?php endif; ?>
                                </p>
                            </div>

                            <?php echo $__env->make('managers.units._parts.amenities', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <input type="submit" value="Create Unit" class="button is-success is-fullwidth m-t-15">
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>




       

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>