<h4>Amenities</h4>

<?php
$amenities = [
    'Pool',
    'Indoor Pool',
    'Outdoor Pool',
    'Heated Pool',
    'Saline Pool',
    'Zero-Entry Pool',
    'Jacuzzi',
    'Hot Tub',
    'Whirlpool',
    'Sauna / Steam Room',
    'Gym / Fitness Facilities',
    'Dog Run',
    'Game Room',
    'Tennis Courts',
    'Basketball Courts',
    'Child Activity Center',
    'Beach Chairs',
    'Dock / Boardwalk',
    'Laundry Facility',
    'Bar / Lounge',
    'Restaurant',
    'Elevator',
    'Handicap Features',
];
?>

<select name="amenities[]" id="amenities" class="select is-multiple is-fullwidth" multiple>
    <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option <?php echo e(old('amenities') && in_array($amenity, old('amenities')) ? 'selected' : isset($complex) && in_array($amenity, explode(', ', $complex->amenities)) ? 'selected' : ''); ?> value="<?php echo e($amenity); ?>"><?php echo e($amenity); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

<p class="help">
    These are the amenities for the complex, not the unit.  Hold ctrl (command on Mac) and click to select multiple amenities.
</p>

<p class="help">
    Don't see the amenity you're looking for?  <a href="#">Request one to be added</a>
</p>
