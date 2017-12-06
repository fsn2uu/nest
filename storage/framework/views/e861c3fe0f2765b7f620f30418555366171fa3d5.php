<?php $__env->startSection('content'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/lightslider.min.css')); ?>">

    <div class="container">
        <div class="content">
            <div class="columns">
                <div class="column is-three-quarters">
                    <h1>
                        <?php echo e(isset($unit->complex) ? $unit->complex->name.' ' : ''); ?>

                        <?php echo e($unit->name ? $unit->name.' ' : ''); ?>

                        <?php echo e($unit->unit_no ? 'Unit '.$unit->unit_no : ''); ?>

                    </h1>

                    <ul id="lightSlider">
                        <?php $__currentLoopData = $unit->photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <img src="<?php echo e(asset($photo->filename)); ?>" alt="Placeholder image">
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                    <div class="columns">
                        <div class="column has-text-centered">
                            <strong>Beds:</strong> <?php echo e($unit->beds); ?>

                        </div>

                        <div class="column has-text-centered">
                            <strong>Baths:</strong> <?php echo e($unit->baths); ?>

                        </div>

                        <div class="column has-text-centered">
                            <strong>Sleeps:</strong> <?php echo e($unit->sleeps); ?>

                        </div>

                        <div class="column has-text-centered">
                            <strong>Type:</strong> <?php echo e($unit->type); ?>

                        </div>

                        <div class="column has-text-centered">
                            <strong>Pet Friendly:</strong> <?php echo e($unit->pet_friendly == 1 ? 'Yes' : 'No'); ?>

                        </div>

                    </div>

                    <?php echo nl2br($unit->description); ?>


                    <?php if($unit->amenities): ?>
                        <h3>Unit Amenities</h3>
                        <?php echo e($unit->amenities); ?>

                    <?php endif; ?>

                    <?php if(@$unit->complex->amenities): ?>
                        <h3>Complex Amenities</h3>
                        <?php echo e($unit->complex->amenities); ?>

                    <?php endif; ?>

                    <h3>Availability</h3>
                    [AVAIL CALENDARS GO HERE]

                    <h3>Rates</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Daily Rate</th>
                                <th>Weekly Rate</th>
                            </tr>
                        </thead>
                        <?php if($unit->schedule): ?>
                            <?php $__currentLoopData = $unit->schedule->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($r->name); ?></td>
                                    <td><?php echo e($r->start); ?></td>
                                    <td><?php echo e($r->end); ?></td>
                                    <td>$<?php echo e(number_format($r->daily, 2)); ?></td>
                                    <td>$<?php echo e(number_format($r->weekly, 2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php elseif($unit->complex->schedule): ?>
                            <?php $__currentLoopData = $unit->complex->schedule->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($r->name); ?></td>
                                    <td><?php echo e($r->start); ?></td>
                                    <td><?php echo e($r->end); ?></td>
                                    <td>$<?php echo e(number_format($r->daily, 2)); ?></td>
                                    <td>$<?php echo e(number_format($r->weekly, 2)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </table>
                </div> 

                <div class="column is-one-quarter">
                    <h3>Book Now</h3>
                    <form action="#">
                        <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="unit_id" value="<?php echo e($unit->id); ?>">

                        <div class="field">
                            <div class="control">
                                <input type="text" name="arrive" id="arrive" class="input" placeholder="Arrival Date">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input type="text" name="depart" id="depart" class="input" placeholder="Departure Date">
                            </div>
                        </div>

                        <div class="field">
                            <div class="select is-fullwidth">
                                <select name="adults" id="adults">
                                    <option value="">Select # Adults</option>
                                    <?php for($i=1; $i <= 15; $i++): ?>
                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?><?php echo e($i == 15 ? '+' : ''); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <div class="select is-fullwidth">
                                <select name="kids" id="kids">
                                    <option value="">Select # Kids</option>
                                    <?php for($i=1; $i <= 15; $i++): ?>
                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?><?php echo e($i == 15 ? '+' : ''); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <button class="button is-success is-outlined is-fullwidth">Book Now</button>
                    </form>

                    <h3>Rental Managed By</h3>
                    <a href="<?php echo e(!strstr($unit->company->url, 'http://') ? 'http://' : ''); ?><?php echo e(!strstr($unit->company->url, 'www.') ? 'www.' : ''); ?><?php echo e($unit->company->url); ?>" target="_blank">
                        <figure class="image is-fullwidth" style="margin-left:0; margin-right:0;">
                            <img src="<?php echo e(asset($unit->company->logo->filename)); ?>" alt="Placeholder image">
                        </figure>
                    </a>

                    <h4 class="has-text-centered">
                        <?php echo e($unit->company->name); ?>

                    </h4>

                    <div class="columns has-text-centered">
                        <div class="column">
                            <a href="#" class="button">
                                <i class="fa fa-search m-r-10"></i> Our Units
                            </a>
                        </div>

                        <div class="column">
                            <a href="#" class="button">
                                <i class="fa fa-envelope m-r-10"></i> Ask a Question
                            </a>
                        </div>
                    </div>
                    <button class="button" id="testButton">Test</button>
                </div> 
            </div> 
        </div> 
    </div> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(asset('js/lightslider.min.js')); ?>"></script>
    <script>
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 9,
        auto: true,
        pause: 3000
    });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>