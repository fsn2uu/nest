@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>
                Add a User
            </h1>
            <form action="{{ route('managers.users.store') }}" method="post">
                {{ csrf_field() }}

                @include('managers.users._parts.baseForm')

                <input type="submit" value="Create User" class="button is-success">
            </form>
        </div>
    </div>

@stop
