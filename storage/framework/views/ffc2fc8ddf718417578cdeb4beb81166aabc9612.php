<?php if(Auth::user()->hasRole('cysy')): ?>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            <li<?php echo e((Request::segment(3) == '') ? ' class="active"' : ''); ?>><a href="<?php echo e(route('cysy.dashboard')); ?>">Dashboard<?php echo (Request::segment(3) == '') ? ' <span class="sr-only">(current)</span>' : ''; ?></a></li>
            
            <li<?php echo e((Request::segment(3) == 'companies') ? ' class="active"' : ''); ?>><a href="<?php echo e(route('cysy.companies.index')); ?>">Companies<?php echo (Request::segment(3) == 'companies') ? ' <span class="sr-only">(current)</span>' : ''; ?></a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
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
        </ul>
    </div>
<?php endif; ?>