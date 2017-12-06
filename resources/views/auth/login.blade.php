@extends('layouts.app')

@section('content')


    <div class="columns">
        <div class="column is-one-third is-offset-one-third m-t-100">
            <div class="card">
                <div class="card-content">
                    <h1 class="title">Log In</h1>
                    <form action="{{route('login')}}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="field">
                            <label for="email" class="label">Email</label>
                            <p class="control">
                                <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="text" name="email" id="email" placeholder="you@example.com" required>
                                @if($errors->has('email'))
                                    <p class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </p>
                        </div>

                        <div class="field">
                            <label for="password" class="label">Password</label>
                            <p class="control">
                                <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" id="password">
                            </p>
                            @if($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <b-checkbox name="remember" class="m-t-20">Remember Me</b-checkbox>

                        <button class="button is-primary is-outlined is-fullwidth m-t-30">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
