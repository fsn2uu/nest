<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Users
                    </h1>
                </div>

                <div class="level-right">
                    <a href="<?php echo e(route('managers.users.create')); ?>" class="button is-primary">Add a User</a>
                </div>
            </div>

            <?php if($users->count() < 1): ?>
                <h3>There are no users to display.</h3>
            <?php else: ?>
                <table class="table is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>User Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($user->name); ?>

                            </td>
                            <td>
                                <?php echo e($user->email); ?>

                            </td>
                            <td>
                                <?php echo e($user->phone); ?>

                            </td>
                            <td>
                                <?php if($user->hasRole('cysy')): ?>
                                    CYSY
                                <?php elseif($user->hasRole('managers')): ?>
                                    Manager
                                <?php elseif($user->hasRole('owners')): ?>
                                    Owner
                                <?php else: ?>
                                    Traveler
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('managers.users.show', $user->id)); ?>" class="button"><i class="fa fa-fw fa-info"></i></a>
                                <a href="<?php echo e(route('managers.users.edit', $user->id)); ?>" class="button"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="<?php echo e(route('managers.users.destroy', $user->id)); ?>" data-id="delete<?php echo e($user->id); ?>" class="button is-danger"><i class="fa fa-fw fa-trash"></i></a>
                                <form action="<?php echo e(route('managers.users.destroy', $user->id)); ?>" id="delete<?php echo e($user->id); ?>">
                                    <?php echo e(method_field('delete')); ?>

                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(function(){
            $('.is-danger').on('click', function(e){
                e.preventDefault();

                var conf = confirm('Are you sure you want to do this?  There are no whoopsies!');

                if(conf === true)
                {
                    var formId = $(this).data('id');
                    $('#' + formId).submit();
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>