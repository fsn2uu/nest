@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Add a Company</h1>

            <form action="{{ route('cysy.companies.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include('cysy.companies._parts.baseForm')

                <input type="submit" value="Create Company" class="button is-success">
            </form>
        </div>
    </div>

@stop
