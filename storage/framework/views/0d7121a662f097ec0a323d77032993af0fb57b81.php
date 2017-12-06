<div class="field">
    <label for="name" class="label">Full Name</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('name') ? 'is-danger' : ''); ?>" type="text"
        name="name" id="name" required value="<?php echo e(isset($user) ? $user->name : old('name')); ?>">
        <?php if($errors->has('name')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('name')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="email" class="label">Email Address</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('email') ? 'is-danger' : ''); ?>" type="text"
        name="email" id="email" required value="<?php echo e(isset($user) ? $user->email : old('email')); ?>">
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
        <input class="input <?php echo e($errors->has('password') ? 'is-danger' : ''); ?>" type="password"
        name="password" id="password" required>
        <?php if($errors->has('password')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('password')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="role_id" class="label">Role</label>
    <p class="select is-fullwidth">
        <select name="role_id" id="role_id" class="select <?php echo e($errors->has('role_id') ? 'is-danger' : ''); ?>" required>
            <option value="">Select a Role</option>
            <?php $__currentLoopData = \App\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($r->display_name != 'Cysy' && $r->display_name != 'Travelers'): ?>
                    <option <?php echo e(isset($user) && $user->hasRole($r->name) ? 'selected' : ''); ?> value="<?php echo e($r->id); ?>"><?php echo e($r->display_name); ?></option>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('role_id')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('role_id')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>
