<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>Find Your Vacation Destination</h1>

            <form action="">
                <div class="level">
                    <div class="field">
                        <div class="control">
                            <input type="text" name="" id="" class="input" placeholder="City, Zip Code, etc.">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="text" name="start" id="start" class="input" placeholder="Arrival Date">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="text" name="end" id="end" class="input" placeholder="Departure Date">
                        </div>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="adults" id="adults">
                                <option value="">Adults</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="kids" id="kids">
                                <option value="">Kids</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="kids" id="kids">
                                <option value="">Kids</option>
                            </select>
                        </div>
                    </div>
                    <button class="button is-success is-large"><i class="fa fa-search fa-3"></i></button>
                </div>
            </form>

            <?php if($units->count() < 1): ?>
                <h3>Sorry, we couldn't find any units that match your search.</h3>
            <?php else: ?>
                <?php $i = 0; ?>
                <div class="level">
                    <div class="level-left">
                        <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="level-item">
                                <div class="card" style="width:385px;">
                                    <div class="card-image">
                                        <figure class="image is-4by3" style="margin-left:0; margin-right:0;">
                                            <a href="<?php echo e(route('show', $unit->id)); ?>">
                                                <img src="<?php echo e(asset(@$unit->photos->first()->filename)); ?>" onerror="this.src='https://placehold.it/1280x960'" alt="Placeholder image">
                                            </a>
                                        </figure>
                                    </div> 

                                    <div class="card-content">
                                        <div class="content has-text-centered">
                                            <h3>
                                                <?php echo e(isset($unit->complex) ? $unit->complex->name.' ' : ''); ?>

                                                <?php echo e($unit->name ? $unit->name.' ' : ''); ?>

                                                <?php echo e($unit->unit_no ? 'Unit '.$unit->unit_no : ''); ?>

                                            </h3>

                                            <div class="columns">
                                                <div class="column">
                                                    <strong>Beds:</strong> <?php echo e($unit->beds); ?>

                                                </div>
                                                <div class="column">
                                                    <strong>Baths:</strong> <?php echo e($unit->baths); ?>

                                                </div>
                                                <div class="column">
                                                    <strong>Sleeps:</strong> <?php echo e($unit->sleeps); ?>

                                                </div>
                                            </div> 

                                            <div class="columns">
                                                <div class="column">
                                                    <?php echo e(ucwords($unit->city ?: $unit->complex->city)); ?>

                                                </div>
                                                <div class="column">
                                                    <?php echo e(ucwords($unit->type)); ?>

                                                </div>
                                            </div> 
                                        </div> 
                                    </div> 

                                    <footer class="card-footer">
                                        <a href="<?php echo e(route('show', $unit->id)); ?>" class="card-footer-item">More Info</a>
                                        <a href="#" class="card-footer-item">Favorite</a>
                                        <a href="#" class="card-footer-item">Book Now</a>
                                    </footer>
                                </div> 
                            </div> 

                            <?php $i++; ?>

                            <?php if($i % 3 == 0): ?>
                                </div>
                                </div>
                                <div class="level">
                                <div class="level-left">
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> 
                </div> 
            <?php endif; ?>


        </div> 
    </div> 

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>