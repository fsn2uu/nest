@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Edit {{ $company->name }}</h1>

            <form action="{{ route('cysy.companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}

                @include('cysy.companies._parts.baseForm')

                <input type="submit" value="Update Company" class="button is-success">
            </form>
        </div>
    </div>

@stop
