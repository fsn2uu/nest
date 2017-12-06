<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Nest')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow" style="margin-bottom: 25px;">
          <div class="navbar-brand">
            <a class="navbar-item" href="#">
              <img src="https://placehold.it/175x95" alt="Bulma: a modern CSS framework based on Flexbox">
            </a>
            <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>

          <div class="navbar-menu">
            <div class="navbar-start">
                <?php if(!Auth::check() || Auth::user()->hasRole('traveler')): ?>
                    <?php echo $__env->make('layouts._navTravelers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif(Auth::user()->hasRole('cysy')): ?>
                    <?php echo $__env->make('layouts._navCysy', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif(Auth::user()->hasRole('managers')): ?>
                    <?php echo $__env->make('layouts._navManagers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php elseif(Auth::user()->hasRole('owners')): ?>
                    <?php echo $__env->make('layouts._navOwners', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php endif; ?>
            </div>

            <div class="navbar-end">
                <?php if(!Auth::check() || Auth::user()->hasRole('traveler')): ?>
                    <a href="<?php echo e(route('list')); ?>" class="navbar-item is-tab">List Your Properties</a>
                <?php endif; ?>

              <?php if(Auth::guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="navbar-item is-tab">Login</a>
                <a href="<?php echo e(route('register')); ?>" class="navbar-item is-tab">Create an Account</a>
              <?php else: ?>
                  <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                      <?php echo e(Auth::user()->name); ?>

                    </a>
                    <div class="navbar-dropdown is-boxed is-right">
                        <a href="#" class="navbar-item"><i class="fa fa-fw m-r-10 fa-bell"></i> Alerts</a>
                        <a href="#" class="navbar-item"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i> My Profile</a>
                        <a href="#" class="navbar-item"><i class="fa fa-fw m-r-10 fa-cog"></i> Settings</a>
                        <hr class="navbar-divider">
                      <a class="navbar-item" href="<?php echo e(route('logout')); ?>"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw m-r-10 fa-sign-out"></i> Logout
                      </a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo e(csrf_field()); ?>

                      </form>
                    </div>
                </div>
              <?php endif; ?>

            </div>
          </div>
        </nav>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->make('notifications.toast', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
