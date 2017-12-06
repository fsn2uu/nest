<div class="field">
    <label for="name" class="label">Unit Name</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('name') ? 'is-danger' : ''); ?>" type="text"
        name="name" id="name" value="<?php echo e(isset($unit) ? $unit->name : ''); ?>">
        <p class="help">
            Do not enter the unit number here.  Unit numbers will automatically be added to the name by the system.
            If your unit name is 'complex name - unit number', leave this field blank.
        </p>
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
        <textarea name="description" id="description" cols="30" rows="10"
        class="textarea <?php echo e($errors->has('description') ? 'is-danger' : ''); ?>"><?php echo e(isset($unit) ? $unit->description : ''); ?></textarea>
        <?php if($errors->has('description')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('description')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="name" class="label">Complex</label>
    <p class="control">
        <select name="complex_id" id="complex_id" class="select <?php echo e($errors->has('complex_id') ? ' is-danger' : ''); ?>">
            <option value="">Select a Complex</option>
            <?php $__currentLoopData = App\Complex::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($row->id); ?>"<?php echo e((@$unit->complex_id == $row->id || Request::get('complex_id') == $row->id)? ' selected' : ''); ?>><?php echo e($row->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <p class="help">
            Complexes are not required.  Only choose a complex if the unit does not have a shared address.
        </p>
        <?php if($errors->has('complex_id')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('complex_id')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="unit_no" class="label">Unit Number</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('unit_no') ? 'is-danger' : ''); ?>" type="text"
        name="unit_no" id="unit_no" value="<?php echo e(isset($unit) ? $unit->unit_no : ''); ?>">
        <p class="help">
            Do not enter the word 'Unit' here.  'Unit' will be added where it is needed.
        </p>
        <?php if($errors->has('unit_no')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('unit_no')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="beds" class="label"># Bedrooms</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('beds') ? 'is-danger' : ''); ?>" type="text"
        name="beds" id="beds" value="<?php echo e(isset($unit) ? $unit->beds : ''); ?>">
        <?php if($errors->has('beds')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('beds')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="baths" class="label"># Bathrooms</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('baths') ? 'is-danger' : ''); ?>" type="text"
        name="baths" id="baths" value="<?php echo e(isset($unit) ? $unit->baths : ''); ?>">
        <?php if($errors->has('baths')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('baths')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="sleeps" class="label"># Sleeps</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('sleeps') ? 'is-danger' : ''); ?>" type="text"
        name="sleeps" id="sleeps" value="<?php echo e(isset($unit) ? $unit->sleeps : ''); ?>">
        <?php if($errors->has('sleeps')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('sleeps')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="form-check">
  <label class="form-check-label">
    <input class="form-check-input" type="checkbox" name="pet_friendly" value="1"<?php echo e((@$unit->pet_friendly == 1) ? ' checked' : ''); ?>>
    Pet Friendly
  </label>
</div>

<div class="field">
    <label for="address" class="label">Address</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('address') ? 'is-danger' : ''); ?>" type="text"
        name="address" id="address" value="<?php echo e(isset($unit) ? $unit->address : ''); ?>">
        <p class="help">
            Add an address if the unit is not part of a complex.  Units added to complexes will inherit the address of the complex, unless you specify one here.
        </p>
        <?php if($errors->has('address')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('address')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="address2" class="label">Address 2</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('address2') ? 'is-danger' : ''); ?>" type="text"
        name="address2" id="address2" value="<?php echo e(isset($unit) ? $unit->address2 : ''); ?>">
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
        name="city" id="city" value="<?php echo e(isset($unit) ? $unit->city : ''); ?>">
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
        <select name="state" id="state" class="select">
            <option value="">Select a State</option>
            <option value="AL"<?php echo e(old('state') == 'AL' ? ' selected' : isset($unit) && $unit->state == 'AL' ? ' selected' : ''); ?>>
                Alabama</option>
            <option value="AK"<?php echo e(old('state') == 'AK' ? ' selected' : isset($unit) && $unit->state == 'AK' ? ' selected' : ''); ?>>
                Alaska</option>
            <option value="AZ"<?php echo e(old('state') == 'AZ' ? ' selected' : isset($unit) && $unit->state == 'AZ' ? ' selected' : ''); ?>>
                Arizona</option>
            <option value="AR"<?php echo e(old('state') == 'AR' ? ' selected' : isset($unit) && $unit->state == 'AR' ? ' selected' : ''); ?>>
                Arkansas</option>
            <option value="CA"<?php echo e(old('state') == 'CA' ? ' selected' : isset($unit) && $unit->state == 'CA' ? ' selected' : ''); ?>>
                California</option>
            <option value="CO"<?php echo e(old('state') == 'CO' ? ' selected' : isset($unit) && $unit->state == 'CO' ? ' selected' : ''); ?>>
                Colorado</option>
            <option value="CT"<?php echo e(old('state') == 'CT' ? ' selected' : isset($unit) && $unit->state == 'CT' ? ' selected' : ''); ?>>
                Connecticut</option>
            <option value="DE"<?php echo e(old('state') == 'DE' ? ' selected' : isset($unit) && $unit->state == 'DE' ? ' selected' : ''); ?>>
                Delaware</option>
            <option value="DC"<?php echo e(old('state') == 'DC' ? ' selected' : isset($unit) && $unit->state == 'DC' ? ' selected' : ''); ?>>
                District Of Columbia</option>
            <option value="FL"<?php echo e(old('state') == 'FL' ? ' selected' : isset($unit) && $unit->state == 'FL' ? ' selected' : ''); ?>>
                Florida</option>
            <option value="GA"<?php echo e(old('state') == 'GA' ? ' selected' : isset($unit) && $unit->state == 'GA' ? ' selected' : ''); ?>>
                Georgia</option>
            <option value="HI"<?php echo e(old('state') == 'HI' ? ' selected' : isset($unit) && $unit->state == 'HI' ? ' selected' : ''); ?>>
                Hawaii</option>
            <option value="ID"<?php echo e(old('state') == 'ID' ? ' selected' : isset($unit) && $unit->state == 'ID' ? ' selected' : ''); ?>>
                Idaho</option>
            <option value="IL"<?php echo e(old('state') == 'IL' ? ' selected' : isset($unit) && $unit->state == 'IL' ? ' selected' : ''); ?>>
                Illinois</option>
            <option value="IN"<?php echo e(old('state') == 'IN' ? ' selected' : isset($unit) && $unit->state == 'IN' ? ' selected' : ''); ?>>
                Indiana</option>
            <option value="IA"<?php echo e(old('state') == 'IA' ? ' selected' : isset($unit) && $unit->state == 'IA' ? ' selected' : ''); ?>>
                Iowa</option>
            <option value="KS"<?php echo e(old('state') == 'KS' ? ' selected' : isset($unit) && $unit->state == 'KS' ? ' selected' : ''); ?>>
                Kansas</option>
            <option value="KY"<?php echo e(old('state') == 'KY' ? ' selected' : isset($unit) && $unit->state == 'KY' ? ' selected' : ''); ?>>
                Kentucky</option>
            <option value="LA"<?php echo e(old('state') == 'LA' ? ' selected' : isset($unit) && $unit->state == 'LA' ? ' selected' : ''); ?>>
                Louisiana</option>
            <option value="ME"<?php echo e(old('state') == 'ME' ? ' selected' : isset($unit) && $unit->state == 'ME' ? ' selected' : ''); ?>>
                Maine</option>
            <option value="MD"<?php echo e(old('state') == 'MD' ? ' selected' : isset($unit) && $unit->state == 'MD' ? ' selected' : ''); ?>>
                Maryland</option>
            <option value="MA"<?php echo e(old('state') == 'MA' ? ' selected' : isset($unit) && $unit->state == 'MA' ? ' selected' : ''); ?>>
                Massachusetts</option>
            <option value="MI"<?php echo e(old('state') == 'MI' ? ' selected' : isset($unit) && $unit->state == 'MI' ? ' selected' : ''); ?>>
                Michigan</option>
            <option value="MN"<?php echo e(old('state') == 'MN' ? ' selected' : isset($unit) && $unit->state == 'MN' ? ' selected' : ''); ?>>
                Minnesota</option>
            <option value="MS"<?php echo e(old('state') == 'MS' ? ' selected' : isset($unit) && $unit->state == 'MS' ? ' selected' : ''); ?>>
                Mississippi</option>
            <option value="MO"<?php echo e(old('state') == 'MO' ? ' selected' : isset($unit) && $unit->state == 'MO' ? ' selected' : ''); ?>>
                Missouri</option>
            <option value="MT"<?php echo e(old('state') == 'MT' ? ' selected' : isset($unit) && $unit->state == 'MT' ? ' selected' : ''); ?>>
                Montana</option>
            <option value="NE"<?php echo e(old('state') == 'NE' ? ' selected' : isset($unit) && $unit->state == 'NE' ? ' selected' : ''); ?>>
                Nebraska</option>
            <option value="NV"<?php echo e(old('state') == 'NV' ? ' selected' : isset($unit) && $unit->state == 'NV' ? ' selected' : ''); ?>>
                Nevada</option>
            <option value="NH"<?php echo e(old('state') == 'NH' ? ' selected' : isset($unit) && $unit->state == 'NH' ? ' selected' : ''); ?>>
                New Hampshire</option>
            <option value="NJ"<?php echo e(old('state') == 'NJ' ? ' selected' : isset($unit) && $unit->state == 'NJ' ? ' selected' : ''); ?>>
                New Jersey</option>
            <option value="NM"<?php echo e(old('state') == 'NM' ? ' selected' : isset($unit) && $unit->state == 'NM' ? ' selected' : ''); ?>>
                New Mexico</option>
            <option value="NY"<?php echo e(old('state') == 'NY' ? ' selected' : isset($unit) && $unit->state == 'NY' ? ' selected' : ''); ?>>
                New York</option>
            <option value="NC"<?php echo e(old('state') == 'NC' ? ' selected' : isset($unit) && $unit->state == 'NC' ? ' selected' : ''); ?>>
                North Carolina</option>
            <option value="ND"<?php echo e(old('state') == 'ND' ? ' selected' : isset($unit) && $unit->state == 'ND' ? ' selected' : ''); ?>>
                North Dakota</option>
            <option value="OH"<?php echo e(old('state') == 'OH' ? ' selected' : isset($unit) && $unit->state == 'OH' ? ' selected' : ''); ?>>
                Ohio</option>
            <option value="OK"<?php echo e(old('state') == 'OK' ? ' selected' : isset($unit) && $unit->state == 'OK' ? ' selected' : ''); ?>>
                Oklahoma</option>
            <option value="OR"<?php echo e(old('state') == 'OR' ? ' selected' : isset($unit) && $unit->state == 'OR' ? ' selected' : ''); ?>>
                Oregon</option>
            <option value="PA"<?php echo e(old('state') == 'PA' ? ' selected' : isset($unit) && $unit->state == 'PA' ? ' selected' : ''); ?>>
                Pennsylvania</option>
            <option value="RI"<?php echo e(old('state') == 'RI' ? ' selected' : isset($unit) && $unit->state == 'RI' ? ' selected' : ''); ?>>
                Rhode Island</option>
            <option value="SC"<?php echo e(old('state') == 'SC' ? ' selected' : isset($unit) && $unit->state == 'SC' ? ' selected' : ''); ?>>
                South Carolina</option>
            <option value="SD"<?php echo e(old('state') == 'SD' ? ' selected' : isset($unit) && $unit->state == 'SD' ? ' selected' : ''); ?>>
                South Dakota</option>
            <option value="TN"<?php echo e(old('state') == 'TN' ? ' selected' : isset($unit) && $unit->state == 'TN' ? ' selected' : ''); ?>>
                Tennessee</option>
            <option value="TX"<?php echo e(old('state') == 'TX' ? ' selected' : isset($unit) && $unit->state == 'TX' ? ' selected' : ''); ?>>
                Texas</option>
            <option value="UT"<?php echo e(old('state') == 'UT' ? ' selected' : isset($unit) && $unit->state == 'UT' ? ' selected' : ''); ?>>
                Utah</option>
            <option value="VT"<?php echo e(old('state') == 'VT' ? ' selected' : isset($unit) && $unit->state == 'VT' ? ' selected' : ''); ?>>
                Vermont</option>
            <option value="VA"<?php echo e(old('state') == 'VA' ? ' selected' : isset($unit) && $unit->state == 'VA' ? ' selected' : ''); ?>>
                Virginia</option>
            <option value="WA"<?php echo e(old('state') == 'WA' ? ' selected' : isset($unit) && $unit->state == 'WA' ? ' selected' : ''); ?>>
                Washington</option>
            <option value="WV"<?php echo e(old('state') == 'WV' ? ' selected' : isset($unit) && $unit->state == 'WV' ? ' selected' : ''); ?>>
                West Virginia</option>
            <option value="WI"<?php echo e(old('state') == 'WI' ? ' selected' : isset($unit) && $unit->state == 'WI' ? ' selected' : ''); ?>>
                Wisconsin</option>
            <option value="WY"<?php echo e(old('state') == 'WY' ? ' selected' : isset($unit) && $unit->state == 'WY' ? ' selected' : ''); ?>>
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
        name="zip" id="zip" value="<?php echo e(isset($unit) ? $unit->zip : ''); ?>">
        <?php if($errors->has('zip')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('zip')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="schedule_id" class="label">Rate Schedule</label>
    <p class="control">
        <select name="schedule_id" id="schedule_id" class="form-control">
            <option value="">Select a Rate Schedule</option>
            <?php $__currentLoopData = \App\Schedule::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($r->id); ?>"<?php echo e((@$unit->schedule_id == $r->id) ? ' selected' : ''); ?>><?php echo e($r->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <?php if($errors->has('schedule_id')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('schedule_id')); ?>

            </p>
        <?php endif; ?>
    </p>
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
