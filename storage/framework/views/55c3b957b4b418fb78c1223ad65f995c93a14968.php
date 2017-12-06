<?php $__env->startSection('content'); ?>

    <div class="container">
        <a href="#" id="test" style="display: block;">test</a>
        <div id="testDiv" style="display: block; height: 0px; width: 1000px; background-color: gray; overflow: hidden;">test</div>
        <a href="#" style="display: block;">placeholder</a>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $('#test').on('click', function(e){
            e.preventDefault();

            $('#testDiv').animate({
                height:  500
            }, 1000);
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>