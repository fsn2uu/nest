<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="content">
            <h1>Add a Rate Schedule</h1>

            <form action="<?php echo e(route('managers.rates.store')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="field">
                    <label for="" class="label">Name</label>
                    <p class="control">
                        <input type="text" name="name" id="name" class="input" required>
                    </p>
                    <p class="help">Rate schedules are not visibile to travelers.</p>
                </div>

                <h3>Rates</h3>
                <p class="help">
                    Don't add dollar signs to rates; they will be automatically added later.
                </p>
                <div class="columns">
                    <div class="column">
                        <strong>Name</strong>
                    </div>
                    <div class="column">
                        <strong>Start Date</strong>
                    </div>
                    <div class="column">
                        <strong>End Date</strong>
                    </div>
                    <div class="column">
                        <strong>Daily Rate</strong>
                    </div>
                    <div class="column">
                        <strong>Weekly Rate</strong>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="" class="label"></label>
                            <p class="control">
                                <input type="text" name="rates[0][name]" id="" class="input">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="" class="label"></label>
                            <p class="control">
                                <input type="text" name="rates[0][start]" id="" class="input datepicker">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="" class="label"></label>
                            <p class="control">
                                <input type="text" name="rates[0][end]" id="" class="input datepicker">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="" class="label"></label>
                            <p class="control">
                                <input type="text" name="rates[0][daily]" id="" class="input">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="" class="label"></label>
                            <p class="control">
                                <input type="text" name="rates[0][weekly]" id="" class="input">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group m-t-15 m-b-30" id="appendTarget">
                    <a href="#" class="button is-large is-success" id="appender" alt="Add a New Row" title="Add a New Row">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="field">
                    <label for="" class="label">Attach to a Complex</label>
                    <select name="complex_id[]" id="" class="select" multiple>
                        <option value="">Choose a Complex</option>
                        <?php $__currentLoopData = App\Complex::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($r->id); ?>"><?php echo e($r->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="help">
                        Attaching a rate schedule to a unit or complex that already has one will replace the
                        existing schedule.  Reservations already made using a different rate schedule will not be affected.
                    </p>
                </div>

                <div class="field">
                    <label for="" class="label">Attach to a Unit</label>
                    <select name="unit_id[]" id="" class="select" multiple>
                        <option value="">Choose a Unit</option>
                        <?php $__currentLoopData = App\Unit::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($r->id); ?>"><?php echo e($r->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <p class="help">
                        Units without rate schedules will try to inherit the rates from their complex.
                        You can also override specific unit rates in a complex by attaching new rate schedules to the individual units.
                    </p>
                </div>

                <input type="submit" value="Create Schedule" class="button is-success">
            </form>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $('#appender').on('click', function(){
            var input_id = $('.input-rows').length;

            var html = '<div class="row input-rows"> <div class="col"> <label for="">Name</label> <input type="text" name="rates['+input_id+'][name]" class="form-control"> </div> <div class="col"> <label for="">Start Date</label> <input type="text" name="rates['+input_id+'][start]" class="form-control datepicker"> </div> <div class="col"> <label for="">End Date</label> <input type="text" name="rates['+input_id+'][end]" class="form-control datepicker"> </div> <div class="col"> <label for="">Daily Rate</label> <input type="text" name="rates['+input_id+'][daily]" class="form-control"> </div> <div class="col"> <label for="">Weekly Rate</label> <input type="text" name="rates['+input_id+'][weekly]" class="form-control"> </div> </div>';

            $('#appendTarget').before(html);

            return false;
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>