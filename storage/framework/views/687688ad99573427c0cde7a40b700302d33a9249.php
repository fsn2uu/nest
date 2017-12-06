<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li<?php echo e((Request::segment(1) == '') ? ' class="active"' : ''); ?>><a href="<?php echo e(route('index')); ?>">Home<?php echo (Request::segment(1) == '') ? ' <span class="sr-only">(current)</span>' : ''; ?></a></li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <li<?php echo e((Request::segment(1) == 'list-your-properties') ? ' class="active"' : ''); ?>><a href="<?php echo e(route('list')); ?>">List Your Properties<?php echo (Request::segment(1) == 'list-your-properties') ? ' <span class="sr-only">(current)</span>' : ''; ?></a></li>
        <!-- Authentication Links -->
        <?php if(Auth::guest()): ?>
            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
            <li><a href="<?php echo e(route('register')); ?>">Create an Account</a></li>
        <?php else: ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</div>