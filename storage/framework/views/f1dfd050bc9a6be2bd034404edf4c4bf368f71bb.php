<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Companies
                    </h1>
                </div>
                <div class="level-right">
                    <a href="<?php echo e(route('cysy.companies.create')); ?>" class="button is-primary">Add a Company</a>
                </div>
            </div>

            <?php if($companies->count() < 1): ?>
                <h3>There are no companies to display.</h3>
            <?php else: ?>
                <table class="table is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Managers</th>
                            <th>Complexes</th>
                            <th>Units</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->name); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->users->count()); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->complexes->count()); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->units->count()); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->city); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->state); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->phone); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e($company->url); ?>

                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('cysy.companies.show', $company->id)); ?>">
                                    <?php echo e(ucwords($company->status)); ?>

                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>