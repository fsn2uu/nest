<div class="field">
    <label for="name" class="label">Company Name</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('name') ? 'is-danger' : ''); ?>" type="text"
        name="name" id="name" value="<?php echo e(isset($company) ? $company->name : old('name')); ?>">
        <?php if($errors->has('name')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('name')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="phone" class="label">Phone</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('phone') ? 'is-danger' : ''); ?>" type="text"
        name="phone" id="phone" placeholder="(XXX) XXX-XXXX" value="<?php echo e(isset($company) ? $company->phone : ''); ?>">
        <?php if($errors->has('phone')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('phone')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="email" class="label">Email Address</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('email') ? 'is-danger' : ''); ?>" type="text"
        name="email" id="email" placeholder="info@company.com" value="<?php echo e(isset($company) ? $company->email : ''); ?>">
        <?php if($errors->has('email')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('email')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="address" class="label">Address</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('address') ? 'is-danger' : ''); ?>" type="text"
        name="address" id="address" placeholder="123 Main Street" value="<?php echo e(isset($company) ? $company->address : ''); ?>">
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
        name="address2" id="address2" placeholder="Suite #" value="<?php echo e(isset($company) ? $company->address2 : ''); ?>">
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
        name="city" id="city" value="<?php echo e(isset($company) ? $company->city : ''); ?>">
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
        <div class="select <?php echo e($errors->has('state') ? 'is-danger' : ''); ?>">
            <select name="state" id="state">
                <option value="">Select a State</option>
                <option value="AL"<?php echo e((@$company->state == 'AL' || old('state') == 'AL')? ' selected' : ''); ?>>Alabama</option>
                <option value="AK"<?php echo e((@$company->state == 'AK' || old('state') == 'AK')? ' selected' : ''); ?>>Alaska</option>
                <option value="AZ"<?php echo e((@$company->state == 'AZ' || old('state') == 'AZ')? ' selected' : ''); ?>>Arizona</option>
                <option value="AR"<?php echo e((@$company->state == 'AR' || old('state') == 'AR')? ' selected' : ''); ?>>Arkansas</option>
                <option value="CA"<?php echo e((@$company->state == 'CA' || old('state') == 'CA')? ' selected' : ''); ?>>California</option>
                <option value="CO"<?php echo e((@$company->state == 'CO' || old('state') == 'CO')? ' selected' : ''); ?>>Colorado</option>
                <option value="CT"<?php echo e((@$company->state == 'CT' || old('state') == 'CT')? ' selected' : ''); ?>>Connecticut</option>
                <option value="DE"<?php echo e((@$company->state == 'DE' || old('state') == 'DE')? ' selected' : ''); ?>>Delaware</option>
                <option value="DC"<?php echo e((@$company->state == 'DC' || old('state') == 'DC')? ' selected' : ''); ?>>District Of Columbia</option>
                <option value="FL"<?php echo e((@$company->state == 'FL' || old('state') == 'FL')? ' selected' : ''); ?>>Florida</option>
                <option value="GA"<?php echo e((@$company->state == 'GA' || old('state') == 'GA')? ' selected' : ''); ?>>Georgia</option>
                <option value="HI"<?php echo e((@$company->state == 'HI' || old('state') == 'HI')? ' selected' : ''); ?>>Hawaii</option>
                <option value="ID"<?php echo e((@$company->state == 'ID' || old('state') == 'ID')? ' selected' : ''); ?>>Idaho</option>
                <option value="IL"<?php echo e((@$company->state == 'IL' || old('state') == 'IL')? ' selected' : ''); ?>>Illinois</option>
                <option value="IN"<?php echo e((@$company->state == 'IN' || old('state') == 'IN')? ' selected' : ''); ?>>Indiana</option>
                <option value="IA"<?php echo e((@$company->state == 'IA' || old('state') == 'IA')? ' selected' : ''); ?>>Iowa</option>
                <option value="KS"<?php echo e((@$company->state == 'KS' || old('state') == 'KS')? ' selected' : ''); ?>>Kansas</option>
                <option value="KY"<?php echo e((@$company->state == 'KY' || old('state') == 'KY')? ' selected' : ''); ?>>Kentucky</option>
                <option value="LA"<?php echo e((@$company->state == 'LA' || old('state') == 'LA')? ' selected' : ''); ?>>Louisiana</option>
                <option value="ME"<?php echo e((@$company->state == 'ME' || old('state') == 'ME')? ' selected' : ''); ?>>Maine</option>
                <option value="MD"<?php echo e((@$company->state == 'MD' || old('state') == 'MD')? ' selected' : ''); ?>>Maryland</option>
                <option value="MA"<?php echo e((@$company->state == 'MA' || old('state') == 'MA')? ' selected' : ''); ?>>Massachusetts</option>
                <option value="MI"<?php echo e((@$company->state == 'MI' || old('state') == 'MI')? ' selected' : ''); ?>>Michigan</option>
                <option value="MN"<?php echo e((@$company->state == 'MN' || old('state') == 'MN')? ' selected' : ''); ?>>Minnesota</option>
                <option value="MS"<?php echo e((@$company->state == 'MS' || old('state') == 'MS')? ' selected' : ''); ?>>Mississippi</option>
                <option value="MO"<?php echo e((@$company->state == 'MO' || old('state') == 'MO')? ' selected' : ''); ?>>Missouri</option>
                <option value="MT"<?php echo e((@$company->state == 'MT' || old('state') == 'MT')? ' selected' : ''); ?>>Montana</option>
                <option value="NE"<?php echo e((@$company->state == 'NE' || old('state') == 'NE')? ' selected' : ''); ?>>Nebraska</option>
                <option value="NV"<?php echo e((@$company->state == 'NV' || old('state') == 'NV')? ' selected' : ''); ?>>Nevada</option>
                <option value="NH"<?php echo e((@$company->state == 'NH' || old('state') == 'NH')? ' selected' : ''); ?>>New Hampshire</option>
                <option value="NJ"<?php echo e((@$company->state == 'NJ' || old('state') == 'NJ')? ' selected' : ''); ?>>New Jersey</option>
                <option value="NM"<?php echo e((@$company->state == 'NM' || old('state') == 'NM')? ' selected' : ''); ?>>New Mexico</option>
                <option value="NY"<?php echo e((@$company->state == 'NY' || old('state') == 'NY')? ' selected' : ''); ?>>New York</option>
                <option value="NC"<?php echo e((@$company->state == 'NC' || old('state') == 'NC')? ' selected' : ''); ?>>North Carolina</option>
                <option value="ND"<?php echo e((@$company->state == 'ND' || old('state') == 'ND')? ' selected' : ''); ?>>North Dakota</option>
                <option value="OH"<?php echo e((@$company->state == 'OH' || old('state') == 'OH')? ' selected' : ''); ?>>Ohio</option>
                <option value="OK"<?php echo e((@$company->state == 'OK' || old('state') == 'OK')? ' selected' : ''); ?>>Oklahoma</option>
                <option value="OR"<?php echo e((@$company->state == 'OR' || old('state') == 'OR')? ' selected' : ''); ?>>Oregon</option>
                <option value="PA"<?php echo e((@$company->state == 'PA' || old('state') == 'PA')? ' selected' : ''); ?>>Pennsylvania</option>
                <option value="RI"<?php echo e((@$company->state == 'RI' || old('state') == 'RI')? ' selected' : ''); ?>>Rhode Island</option>
                <option value="SC"<?php echo e((@$company->state == 'SC' || old('state') == 'SC')? ' selected' : ''); ?>>South Carolina</option>
                <option value="SD"<?php echo e((@$company->state == 'SD' || old('state') == 'SD')? ' selected' : ''); ?>>South Dakota</option>
                <option value="TN"<?php echo e((@$company->state == 'TN' || old('state') == 'TN')? ' selected' : ''); ?>>Tennessee</option>
                <option value="TX"<?php echo e((@$company->state == 'TX' || old('state') == 'TX')? ' selected' : ''); ?>>Texas</option>
                <option value="UT"<?php echo e((@$company->state == 'UT' || old('state') == 'UT')? ' selected' : ''); ?>>Utah</option>
                <option value="VT"<?php echo e((@$company->state == 'VT' || old('state') == 'VT')? ' selected' : ''); ?>>Vermont</option>
                <option value="VA"<?php echo e((@$company->state == 'VA' || old('state') == 'VA')? ' selected' : ''); ?>>Virginia</option>
                <option value="WA"<?php echo e((@$company->state == 'WA' || old('state') == 'WA')? ' selected' : ''); ?>>Washington</option>
                <option value="WV"<?php echo e((@$company->state == 'WV' || old('state') == 'WV')? ' selected' : ''); ?>>West Virginia</option>
                <option value="WI"<?php echo e((@$company->state == 'WI' || old('state') == 'WI')? ' selected' : ''); ?>>Wisconsin</option>
                <option value="WY"<?php echo e((@$company->state == 'WY' || old('state') == 'WY')? ' selected' : ''); ?>>Wyoming</option>
            </select>
        </div>
        <?php if($errors->has('state')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('state')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="zip" class="label">Zip Code</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('zip') ? 'is-danger' : ''); ?>" type="text"
        name="zip" id="zip" value="<?php echo e(isset($company) ? $company->zip : ''); ?>">
        <?php if($errors->has('zip')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('zip')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="field">
    <label for="url" class="label">Website</label>
    <p class="control">
        <input class="input <?php echo e($errors->has('url') ? 'is-danger' : ''); ?>" type="text"
        name="url" id="url" value="<?php echo e(isset($company) ? $company->url : ''); ?>">
        <?php if($errors->has('url')): ?>
            <p class="help is-danger">
                <?php echo e($errors->first('url')); ?>

            </p>
        <?php endif; ?>
    </p>
</div>

<div class="file m-b-30">
  <label class="file-label">
    <input class="file-input" type="file" name="logo">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fa fa-upload"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
  </label>

  <?php if(Request::segment(4) == 'edit'): ?>
      <p class="help m-l-20">
          Uploading a new logo will replace the existing one.
      </p>
  <?php endif; ?>
</div>
