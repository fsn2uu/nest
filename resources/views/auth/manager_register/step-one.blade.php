@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
                    <h1>Let's get you set up</h1>
                    <p>We need to create the first user.  All managers are created equal
                        so it doesn't matter if you own the company, or if you're waiting on 5 o'clock.</p>
                        <form action="{{ route('list.step.two') }}" method="post">
                            {{ csrf_field() }}

                            <input type="hidden" name="plan_id" value="{{ \Request::get('plan_id') }}">

                            <div class="field">
                                <label for="name" class="label">Name</label>
                                <p class="control">
                                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="input {{ $errors->has('name') ? 'is-danger' : '' }}">
                                </p>
                                @if ($errors->has('name'))
                                    <p class="help is-danger">
                                        {{ $errors->first('name') }}
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="email" class="label">Email Address</label>
                                <p class="control">
                                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                                    class="input {{ $errors->has('email') ? 'is-danger' : '' }}">
                                </p>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="password" class="label">Password</label>
                                <p class="control">
                                    <input type="password" name="password" id="password" class="input {{ $errors->has('password') ? 'is-danger' : '' }}">
                                </p>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">
                                        {{ $errors->first('password') }}
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <label for="password_confirmation" class="label">Confirm Password</label>
                                <p class="control">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}">
                                </p>
                                <p class="help is-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </p>
                            </div>

                            <input type="submit" value="Next Step" class="button is-success">
                        </form>


        </div>
    </div>

@endsection
