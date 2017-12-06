<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>New Unit</h1>

            <form action="<?php echo e(route('managers.units.update', $unit->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

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

                        <input type="submit" value="Create Unit" class="button is-success is-fullwidth m-t-15">
                    </div>
                </div>
            </form>
        </div>
    </div>




       

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

    <aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <div class="sidebar-module">
            <h4>Actions</h4>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="published">Published</option>
                    <option value="draft" selected>Draft</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Create Unit" class="btn btn-primary">
            </div>
        </div>
    </aside><!-- /.blog-sidebar -->

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>