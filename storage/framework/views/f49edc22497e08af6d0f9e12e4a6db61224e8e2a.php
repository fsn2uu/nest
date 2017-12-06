<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        <?php echo e($user->name); ?>

                    </h1>
                </div>

                <div class="level-right">
                    <a href="<?php echo e(route('managers.users.edit', $user->id)); ?>" class="button is-primary">Edit User</a>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-quarter">
                    <img src="<?php echo e($user->get_gravatar($user->email)); ?>" style="width: 100%;">
                </div>

                <div class="column">
                    <table class="table">
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td>#</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Company:</strong></td>
                            <td><?php echo e(isset($user->company->name) ? $user->company->name : ''); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>