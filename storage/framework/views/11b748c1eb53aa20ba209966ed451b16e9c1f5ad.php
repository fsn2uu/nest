<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        <?php echo e($company->name); ?>

                    </h1>
                </div>

                <div class="level-right">
                    <a href="<?php echo e(route('cysy.companies.edit', $company->id)); ?>" class="button is-primary">Edit Company</a>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-quarter">
                    <img src="<?php echo e(asset(@$company->logo->filename)); ?>" style="width: 100%;">
                </div>

                <div class="column">
                    <table class="table">
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td><?php echo e($company->phone); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><?php echo e($company->email); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td>
                                <?php echo e($company->address); ?><br>
                                <?php echo e(($company->address2) ? $company->address.'<br>' : ''); ?>

                                <?php echo e($company->city); ?>, <?php echo e($company->state); ?> <?php echo e($company->zip); ?>

                            </td>
                        </tr>
                        <tr>
                            <td><strong>Website:</strong></td>
                            <td><?php echo e($company->url); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td><?php echo e($company->status); ?></td>
                        </tr>
                        <tr>
                            <td><strong>Managers:</strong></td>
                            <td>
                                <?php if($company->users->count() < 1): ?>
                                    There are no admins to display.
                                <?php else: ?>
                                    <?php $__currentLoopData = $company->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('cysy.users.show', $r->id)); ?>">
                                            <img src="<?php echo e($r->get_gravatar($r->email)); ?>" onerror="this.onerror=null;this.src='<?php echo e(asset('assets/person.png')); ?>'">
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>