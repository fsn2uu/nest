<?php $__env->startSection('content'); ?>


    <div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-100">
            <div class="card">
                <div class="card-content">
                    <h1 class="title">Log In</h1>
                    <form action="<?php echo e(route('login')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <p class="control">
                                <input class="input <?php echo e($errors->has('email') ? 'is-danger' : ''); ?>" type="text" name="email" id="email" placeholder="you@example.com" required>
                                <?php if($errors->has('email')): ?>
                                    <p class="help is-danger">
                                        <?php echo e($errors->first('email')); ?>

                                    </p>
                                <?php endif; ?>
                            </p>
                        </div>

                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <p class="control">
                                <input class="input <?php echo e($errors->has('password') ? 'is-danger' : ''); ?>" type="password" name="password" id="password">
                            </p>
                            <?php if($errors->has('password')): ?>
                                <p class="help is-danger">
                                    <?php echo e($errors->first('password')); ?>

                                </p>
                            <?php endif; ?>
                        </div>

                        <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>

                        <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>