@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>
                Edit {{ $user->name }}
            </h1>
            <form action="{{ route('managers.users.store') }}" method="post">
                {{ csrf_field() }}

                @include('managers.users._parts.baseForm')

                <input type="submit" value="Update User" class="button is-success">
            </form>
        </div>
    </div>

@stop
