<div class="field">
    <label for="name" class="label">User Name</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('name') ? 'is-danger' : ''); ?>" type="text" value="<?php echo e(old('name')); ?>"
        name="name" id="name" placeholder="Some Company" required value="<?php echo e(isset($user) ? $user->name : ''); ?>">
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
        <input class="input <?php echo e($errors->has('email') ? 'is-danger' : ''); ?>" type="text" value="<?php echo e(old('email')); ?>"
        name="email" id="email" placeholder="Some Company" required value="<?php echo e(isset($user) ? $user->email : ''); ?>">
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
        name="password" id="password" placeholder="Some Company" required value="<?php echo e(isset($user) ? $user->password : ''); ?>">
        <?php if($errors->has('password')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('password')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="company_id" class="label">Company</label>
    <p class="control">
        <select name="company_id" id="company_id" class="select <?php echo e($errors->has('company_id') ? 'is-danger' : ''); ?>">
            <option value="">Select a Company</option>
            <?php $__currentLoopData = \App\Company::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(@$user->company_id == $r->id || old('company_id') == $r->id ? 'selected' : ''); ?>

                    value="<?php echo e($r->id); ?>"><?php echo e($r->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <p class="help">
            Leave blank for CYSY employees.
        </p>
        <?php if($errors->has('company_id')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('company_id')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="role_id" class="label">Role</label>
    <p class="control">
        <select name="role_id" id="role_id" class="select <?php echo e($errors->has('role_id') ? 'is-danger' : ''); ?>" required>
            <option value="">Select a Role</option>
            <?php $__currentLoopData = \App\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(isset($user) && $user->hasRole($r->name) ? 'selected' : ''); ?> value="<?php echo e($r->id); ?>"><?php echo e($r->display_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('role_id')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('role_id')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>
