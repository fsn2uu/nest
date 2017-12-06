@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Okay, tell us about your company</h1>
            <p>We need to get your company set up.  Hang in there, we're almost done.</p>
            <form action="{{ route('list.step.three') }}" method="post">
                {{ csrf_field() }}

                {{-- we'll need these later --}}
                <input type="hidden" name="user_name" value="{{ \Request::get('name') }}">
                <input type="hidden" name="user_email" value="{{ \Request::get('email') }}">
                <input type="hidden" name="user_password" value="{{ \Request::get('password') }}">
                <input type="hidden" name="plan_id" value="{{ \Request::get('plan_id') }}">

                @include('cysy.companies._parts.baseForm')

                <input type="submit" value="Next Step" class="button is-success">
            </form>

        </div>
    </div>

@endsection
