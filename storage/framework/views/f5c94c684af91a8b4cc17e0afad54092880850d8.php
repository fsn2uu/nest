<h4>Amenities</h4>

<div class="select is-multiple is-fullwidth">
    <select name="amenities[]" id="amenities" class="select is-multiple is-fullwidth" multiple>
        <option <?php echo e(old('amenities') && in_array('Balcony', old('amenities')) ? 'selected' : isset($unit) && in_array('Balcony', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Balcony">Balcony</option>
        <option <?php echo e(old('amenities') && in_array('patio', old('amenities')) ? 'selected' : isset($unit) && in_array('patio', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="patio">Patio</option>
        <option <?php echo e(old('amenities') && in_array('Full Bar', old('amenities')) ? 'selected' : isset($unit) && in_array('Full Bar', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Full Bar">Full Bar</option>
        <option <?php echo e(old('amenities') && in_array('Sleeper Sofa / Futon', old('amenities')) ? 'selected' : isset($unit) && in_array('Sleeper Sofa / Futon', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Sleeper Sofa / Futon">Sleep Sofa / Futon</option>
        <option <?php echo e(old('amenities') && in_array('Washer / Dryer', old('amenities')) ? 'selected' : isset($unit) && in_array('Washer / Dryer', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Washer / Dryer">Washer / Dryer</option>
        <option <?php echo e(old('amenities') && in_array('Microwave', old('amenities')) ? 'selected' : isset($unit) && in_array('Microwave', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Microwave">Microwave</option>
        <option <?php echo e(old('amenities') && in_array('Cable', old('amenities')) ? 'selected' : isset($unit) && in_array('Cable', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Cable">Cable TV</option>
        <option <?php echo e(old('amenities') && in_array('Satellite', old('amenities')) ? 'selected' : isset($unit) && in_array('Satellite', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Satellite">Satellite TV</option>
        <option <?php echo e(old('amenities') && in_array('Kitchen', old('amenities')) ? 'selected' : isset($unit) && in_array('Kitchen', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Kitchen">Full Kitchen</option>
        <option <?php echo e(old('amenities') && in_array('Stove / Oven', old('amenities')) ? 'selected' : isset($unit) && in_array('Stove / Oven', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Stove / Oven">Stove / Oven</option>
        <option <?php echo e(old('amenities') && in_array('Dishwasher', old('amenities')) ? 'selected' : isset($unit) && in_array('Dishwasher', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Dishwasher">Dishwasher</option>
        <option <?php echo e(old('amenities') && in_array('Linens Provided', old('amenities')) ? 'selected' : isset($unit) && in_array('Linens Provided', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Linens Provided">Linens Provided</option>
        <option <?php echo e(old('amenities') && in_array('Cleaning Services', old('amenities')) ? 'selected' : isset($unit) && in_array('Cleaning Services', explode(',', $unit->amenities)) ? 'selected' : ''); ?> value="Cleaning Services">Cleaning Services</option>
    </select>
</div>

<p class="help">
    These are the amenities for the unit, not the complex.  For example, don't add a pool
    as an amenity on a unit if the unit is part of a complex that has a pool.  Doing so
    will confuse the searches. Hold ctrl (command on Mac) and click to select multiple amenities.
</p>

<p class="help">
    Don't see the amenity you're looking for?  <a href="#">Request one to be added</a>
</p>
