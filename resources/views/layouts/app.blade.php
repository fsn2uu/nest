<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nest') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/lightslider.min.css') }}">

    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow" style="margin-bottom: 25px;">
          <div class="navbar-brand">
            <a class="navbar-item">
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
                @if(Auth::check() && Auth::user()->hasRole('cysy'))
                    @include('layouts._navCysy')
                @elseif(Auth::check() && Auth::user()->hasRole('managers'))
                    @include('layouts._navManagers')
                @elseif(Auth::check() && Auth::user()->hasRole('owners'))
                    @include('layouts._navOwners')
                @else
                    @include('layouts._navTravelers')
                @endif
            </div>

            <div class="navbar-end">
                @if(!Auth::check() || Auth::user()->hasRole('traveler'))
                    <a href="{{ route('list') }}" class="navbar-item is-tab">List Your Properties</a>
                @endif

              @if (Auth::guest())
                <a href="{{ route('login') }}" class="navbar-item is-tab">Login</a>
              @else
                  <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="navbar-dropdown is-boxed is-right">
                        <a href="#" class="navbar-item"><i class="fa fa-fw m-r-10 fa-bell"></i> Alerts</a>
                        <a href="#" class="navbar-item"><i class="fa fa-fw m-r-10 fa-user-circle-o"></i> My Profile</a>
                        @if (Auth::user()->hasRole('managers'))
                            <a href="{{ route('managers.settings.index') }}" class="navbar-item"><i class="fa fa-fw m-r-10 fa-cog"></i> Settings</a>
                        @endif
                        <hr class="navbar-divider">
                      <a class="navbar-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw m-r-10 fa-sign-out"></i> Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </div>
                </div>
              @endif

            </div>
          </div>
        </nav>

        @yield('content')

    </div>

    <footer class="footer">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>Nest</strong> by <a href="http://www.cysy.com" target="_blank">CYber SYtes</a> - Copyright 2017 - {{ date('Y') }}
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    
    @include('notifications.toast')
    @yield('scripts')

    <script>
        function modalConfirm(title, message, trueCallback, falseCallback)
        {
            $('#confirmTitle').text(title)
            $('#confirmMessage').html(message)
            $('#confirmationModal').addClass('is-active')

            $('#confirmModalTrue').unbind('click') //this keeps the callback from running multiple times

            $('#confirmModalTrue').click(function(){
                $('#confirmationModal').removeClass('is-active')
                trueCallback()
                return false
            });

            $('#confirmModalFalse').unbind('click') //this keeps the callback from running multiple times

            $('#confirmModalFalse').click(function(){
                $('#confirmationModal').removeClass('is-active')
                falseCallback()
                return false
            });
        }
    </script>

    <div class="modal" id="confirmationModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title" id="confirmTitle"></p>
            </header>
            <section class="modal-card-body" id="confirmMessage">

            </section>
            <footer class="modal-card-foot">
                <button class="button is-danger is-large" id="confirmModalTrue">Confirm</button>
                <button class="button is-large is-pulled-right" id="confirmModalFalse">Cancel</button>
            </footer>
        </div>
    </div>

</body>
</html>
