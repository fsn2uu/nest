<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
                    <h1>Let's get you set up</h1>
                    <p>We need to create the first user.  All managers are created equal
                        so it doesn't matter if you own the company, or if you're waiting on 5 o'clock.</p>
                        <form action="<?php echo e(route('list.step.two')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>


                            <input type="hidden" name="plan_id" value="<?php echo e(\Request::get('plan_id')); ?>">

                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"
                                    class="input <?php echo e($errors->has('name') ? 'is-danger' : ''); ?>">
                                </p>
                                <?php if($errors->has('name')): ?>
                                    <p class="help is-danger">
                                        <?php echo e($errors->first('name')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="field">
                                <label for="email" class="label">Email Address</label>
                                <p class="control">
                                    <input type="text" name="email" id="email" value="<?php echo e(old('email')); ?>"
                                    class="input <?php echo e($errors->has('email') ? 'is-danger' : ''); ?>">
                                </p>
                                <?php if($errors->has('email')): ?>
                                    <p class="help is-danger">
                                        <?php echo e($errors->first('email')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <p class="control">
                                    <input type="password" name="password" id="password" class="input <?php echo e($errors->has('password') ? 'is-danger' : ''); ?>">
                                </p>
                                <?php if($errors->has('password')): ?>
                                    <p class="help is-danger">
                                        <?php echo e($errors->first('password')); ?>

                                    </p>
                                <?php endif; ?>
                            </div>

                            <div class="field">
                                <label for="password_confirmation" class="label">Confirm Password</label>
                                <p class="control">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="input <?php echo e($errors->has('password_confirmation') ? 'is-danger' : ''); ?>">
                                </p>
                                <p class="help is-danger">
                                    <?php echo e($errors->first('password_confirmation')); ?>

                                </p>
                            </div>

                            <input type="submit" value="Next Step" class="button is-success">
                        </form>


        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>