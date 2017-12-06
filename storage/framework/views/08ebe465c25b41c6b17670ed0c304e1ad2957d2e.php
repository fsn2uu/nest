<div class="field">
    <label for="name" class="label">Complex Name</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('name') ? 'is-danger' : ''); ?>" type="text"
        name="name" id="name" required
        value="<?php echo e(old('name') ? old('name') : isset($complex) ? $complex->name : ''); ?>">
        <?php if($errors->has('name')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('name')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="description" class="label">Description</label>
    <p class="control">
        <textarea name="description" id="" cols="30" rows="10" class="textarea <?php echo e($errors->has('description') ? 'is-danger' : ''); ?>"><?php echo e(old('description') ? old('description') : isset($complex) ? $complex->description : ''); ?></textarea>
        <?php if($errors->has('description')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('description')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="address" class="label">Complex Address</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('address') ? 'is-danger' : ''); ?>" type="text"
        name="address" id="address" required
        value="<?php echo e(old('address') ? old('address') : isset($complex) ? $complex->address : ''); ?>">
        <?php if($errors->has('address')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('address')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="address2" class="label">Complex Address 2</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('address2') ? 'is-danger' : ''); ?>" type="text"
        name="address2" id="address2" placeholder="Suite #, etc."
        value="<?php echo e(old('address2') ? old('address2') : isset($complex) ? $complex->address2 : ''); ?>">
        <?php if($errors->has('address2')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('address2')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="city" class="label">City</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('city') ? 'is-danger' : ''); ?>" type="text"
        name="city" id="city" required
        value="<?php echo e(old('city') ? old('city') : isset($complex) ? $complex->city : ''); ?>">
        <?php if($errors->has('city')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('city')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="state" class="label">State</label>
    <p class="control">
        <select name="state" id="state" class="select" required>
            <option value="">Select a State</option>
            <option value="AL"<?php echo e(old('state') == 'AL' ? ' selected' : isset($complex) && $complex->state == 'AL' ? ' selected' : ''); ?>>
                Alabama</option>
            <option value="AK"<?php echo e(old('state') == 'AK' ? ' selected' : isset($complex) && $complex->state == 'AK' ? ' selected' : ''); ?>>
                Alaska</option>
            <option value="AZ"<?php echo e(old('state') == 'AZ' ? ' selected' : isset($complex) && $complex->state == 'AZ' ? ' selected' : ''); ?>>
                Arizona</option>
            <option value="AR"<?php echo e(old('state') == 'AR' ? ' selected' : isset($complex) && $complex->state == 'AR' ? ' selected' : ''); ?>>
                Arkansas</option>
            <option value="CA"<?php echo e(old('state') == 'CA' ? ' selected' : isset($complex) && $complex->state == 'CA' ? ' selected' : ''); ?>>
                California</option>
            <option value="CO"<?php echo e(old('state') == 'CO' ? ' selected' : isset($complex) && $complex->state == 'CO' ? ' selected' : ''); ?>>
                Colorado</option>
            <option value="CT"<?php echo e(old('state') == 'CT' ? ' selected' : isset($complex) && $complex->state == 'CT' ? ' selected' : ''); ?>>
                Connecticut</option>
            <option value="DE"<?php echo e(old('state') == 'DE' ? ' selected' : isset($complex) && $complex->state == 'DE' ? ' selected' : ''); ?>>
                Delaware</option>
            <option value="DC"<?php echo e(old('state') == 'DC' ? ' selected' : isset($complex) && $complex->state == 'DC' ? ' selected' : ''); ?>>
                District Of Columbia</option>
            <option value="FL"<?php echo e(old('state') == 'FL' ? ' selected' : isset($complex) && $complex->state == 'FL' ? ' selected' : ''); ?>>
                Florida</option>
            <option value="GA"<?php echo e(old('state') == 'GA' ? ' selected' : isset($complex) && $complex->state == 'GA' ? ' selected' : ''); ?>>
                Georgia</option>
            <option value="HI"<?php echo e(old('state') == 'HI' ? ' selected' : isset($complex) && $complex->state == 'HI' ? ' selected' : ''); ?>>
                Hawaii</option>
            <option value="ID"<?php echo e(old('state') == 'ID' ? ' selected' : isset($complex) && $complex->state == 'ID' ? ' selected' : ''); ?>>
                Idaho</option>
            <option value="IL"<?php echo e(old('state') == 'IL' ? ' selected' : isset($complex) && $complex->state == 'IL' ? ' selected' : ''); ?>>
                Illinois</option>
            <option value="IN"<?php echo e(old('state') == 'IN' ? ' selected' : isset($complex) && $complex->state == 'IN' ? ' selected' : ''); ?>>
                Indiana</option>
            <option value="IA"<?php echo e(old('state') == 'IA' ? ' selected' : isset($complex) && $complex->state == 'IA' ? ' selected' : ''); ?>>
                Iowa</option>
            <option value="KS"<?php echo e(old('state') == 'KS' ? ' selected' : isset($complex) && $complex->state == 'KS' ? ' selected' : ''); ?>>
                Kansas</option>
            <option value="KY"<?php echo e(old('state') == 'KY' ? ' selected' : isset($complex) && $complex->state == 'KY' ? ' selected' : ''); ?>>
                Kentucky</option>
            <option value="LA"<?php echo e(old('state') == 'LA' ? ' selected' : isset($complex) && $complex->state == 'LA' ? ' selected' : ''); ?>>
                Louisiana</option>
            <option value="ME"<?php echo e(old('state') == 'ME' ? ' selected' : isset($complex) && $complex->state == 'ME' ? ' selected' : ''); ?>>
                Maine</option>
            <option value="MD"<?php echo e(old('state') == 'MD' ? ' selected' : isset($complex) && $complex->state == 'MD' ? ' selected' : ''); ?>>
                Maryland</option>
            <option value="MA"<?php echo e(old('state') == 'MA' ? ' selected' : isset($complex) && $complex->state == 'MA' ? ' selected' : ''); ?>>
                Massachusetts</option>
            <option value="MI"<?php echo e(old('state') == 'MI' ? ' selected' : isset($complex) && $complex->state == 'MI' ? ' selected' : ''); ?>>
                Michigan</option>
            <option value="MN"<?php echo e(old('state') == 'MN' ? ' selected' : isset($complex) && $complex->state == 'MN' ? ' selected' : ''); ?>>
                Minnesota</option>
            <option value="MS"<?php echo e(old('state') == 'MS' ? ' selected' : isset($complex) && $complex->state == 'MS' ? ' selected' : ''); ?>>
                Mississippi</option>
            <option value="MO"<?php echo e(old('state') == 'MO' ? ' selected' : isset($complex) && $complex->state == 'MO' ? ' selected' : ''); ?>>
                Missouri</option>
            <option value="MT"<?php echo e(old('state') == 'MT' ? ' selected' : isset($complex) && $complex->state == 'MT' ? ' selected' : ''); ?>>
                Montana</option>
            <option value="NE"<?php echo e(old('state') == 'NE' ? ' selected' : isset($complex) && $complex->state == 'NE' ? ' selected' : ''); ?>>
                Nebraska</option>
            <option value="NV"<?php echo e(old('state') == 'NV' ? ' selected' : isset($complex) && $complex->state == 'NV' ? ' selected' : ''); ?>>
                Nevada</option>
            <option value="NH"<?php echo e(old('state') == 'NH' ? ' selected' : isset($complex) && $complex->state == 'NH' ? ' selected' : ''); ?>>
                New Hampshire</option>
            <option value="NJ"<?php echo e(old('state') == 'NJ' ? ' selected' : isset($complex) && $complex->state == 'NJ' ? ' selected' : ''); ?>>
                New Jersey</option>
            <option value="NM"<?php echo e(old('state') == 'NM' ? ' selected' : isset($complex) && $complex->state == 'NM' ? ' selected' : ''); ?>>
                New Mexico</option>
            <option value="NY"<?php echo e(old('state') == 'NY' ? ' selected' : isset($complex) && $complex->state == 'NY' ? ' selected' : ''); ?>>
                New York</option>
            <option value="NC"<?php echo e(old('state') == 'NC' ? ' selected' : isset($complex) && $complex->state == 'NC' ? ' selected' : ''); ?>>
                North Carolina</option>
            <option value="ND"<?php echo e(old('state') == 'ND' ? ' selected' : isset($complex) && $complex->state == 'ND' ? ' selected' : ''); ?>>
                North Dakota</option>
            <option value="OH"<?php echo e(old('state') == 'OH' ? ' selected' : isset($complex) && $complex->state == 'OH' ? ' selected' : ''); ?>>
                Ohio</option>
            <option value="OK"<?php echo e(old('state') == 'OK' ? ' selected' : isset($complex) && $complex->state == 'OK' ? ' selected' : ''); ?>>
                Oklahoma</option>
            <option value="OR"<?php echo e(old('state') == 'OR' ? ' selected' : isset($complex) && $complex->state == 'OR' ? ' selected' : ''); ?>>
                Oregon</option>
            <option value="PA"<?php echo e(old('state') == 'PA' ? ' selected' : isset($complex) && $complex->state == 'PA' ? ' selected' : ''); ?>>
                Pennsylvania</option>
            <option value="RI"<?php echo e(old('state') == 'RI' ? ' selected' : isset($complex) && $complex->state == 'RI' ? ' selected' : ''); ?>>
                Rhode Island</option>
            <option value="SC"<?php echo e(old('state') == 'SC' ? ' selected' : isset($complex) && $complex->state == 'SC' ? ' selected' : ''); ?>>
                South Carolina</option>
            <option value="SD"<?php echo e(old('state') == 'SD' ? ' selected' : isset($complex) && $complex->state == 'SD' ? ' selected' : ''); ?>>
                South Dakota</option>
            <option value="TN"<?php echo e(old('state') == 'TN' ? ' selected' : isset($complex) && $complex->state == 'TN' ? ' selected' : ''); ?>>
                Tennessee</option>
            <option value="TX"<?php echo e(old('state') == 'TX' ? ' selected' : isset($complex) && $complex->state == 'TX' ? ' selected' : ''); ?>>
                Texas</option>
            <option value="UT"<?php echo e(old('state') == 'UT' ? ' selected' : isset($complex) && $complex->state == 'UT' ? ' selected' : ''); ?>>
                Utah</option>
            <option value="VT"<?php echo e(old('state') == 'VT' ? ' selected' : isset($complex) && $complex->state == 'VT' ? ' selected' : ''); ?>>
                Vermont</option>
            <option value="VA"<?php echo e(old('state') == 'VA' ? ' selected' : isset($complex) && $complex->state == 'VA' ? ' selected' : ''); ?>>
                Virginia</option>
            <option value="WA"<?php echo e(old('state') == 'WA' ? ' selected' : isset($complex) && $complex->state == 'WA' ? ' selected' : ''); ?>>
                Washington</option>
            <option value="WV"<?php echo e(old('state') == 'WV' ? ' selected' : isset($complex) && $complex->state == 'WV' ? ' selected' : ''); ?>>
                West Virginia</option>
            <option value="WI"<?php echo e(old('state') == 'WI' ? ' selected' : isset($complex) && $complex->state == 'WI' ? ' selected' : ''); ?>>
                Wisconsin</option>
            <option value="WY"<?php echo e(old('state') == 'WY' ? ' selected' : isset($complex) && $complex->state == 'WY' ? ' selected' : ''); ?>>
                Wyoming</option>
        </select>
        <?php if($errors->has('state')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('state')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="zip" class="label">Zip</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('zip') ? 'is-danger' : ''); ?>" type="text"
        name="zip" id="zip" required
        value="<?php echo e(old('zip') ? old('zip') : isset($complex) ? $complex->zip : ''); ?>">
        <?php if($errors->has('zip')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('zip')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="phone" class="label">Phone</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('phone') ? 'is-danger' : ''); ?>" type="text"
        name="phone" id="phone"
        value="<?php echo e(old('phone') ? old('phone') : isset($complex) ? $complex->phone : ''); ?>">
        <?php if($errors->has('phone')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('phone')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="phone2" class="label">Phone 2</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('phone2') ? 'is-danger' : ''); ?>" type="text"
        name="phone2" id="phone2"
        value="<?php echo e(old('phone2') ? old('phone2') : isset($complex) ? $complex->phone2 : ''); ?>">
        <?php if($errors->has('phone2')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('phone2')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="url" class="label">Website</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('url') ? 'is-danger' : ''); ?>" type="text"
        name="url" id="url"
        value="<?php echo e(old('url') ? old('url') : isset($complex) ? $complex->url : ''); ?>">
        <?php if($errors->has('url')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('url')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="" class="label">Rate Schedule</label>
    <div class="select">
        <select name="schedule_id" id="schedule_id">
            <option value="">Select a Rate Schedule</option>
            <?php $__currentLoopData = Auth::user()->company->schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php echo e(old('schedule_id') == $r->id ? 'selected' : isset($complex) && $complex->schedule_id == $r->id ? 'selected' : ''); ?> value="<?php echo e($r->id); ?>"><?php echo e($r->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>

<label for="" class="label">Photos</label>
<div class="file m-b-25">
  <label class="file-label">
    <input class="file-input" type="file" name="photos[]" multiple>
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose your photos…
      </span>
    </span>
  </label>
</div>
