@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>New Complex</h1>

            <form action="{{ route('managers.complexes.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include('managers.complexes._parts.baseForm')

                @include('managers.complexes._parts.amenities')

                <input type="submit" class="button is-success" value="Create Complex">
            </form>
        </div>
    </div>


@stop

@section('scripts')

    <script src="{{ asset('js/inputmask/inputmask.js') }}"></script>
    <script src="{{ asset('js/inputmask/inputmask.extensions.js') }}"></script>
    <script src="{{ asset('js/inputmask/inputmask.numeric.extensions.js') }}"></script>
    <script src="{{ asset('js/inputmask/inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('js/inputmask/inputmask.phone.extensions.js') }}"></script>
    <script src="{{ asset('js/inputmask/jquery.inputmask.js') }}"></script>

    <script>
        $(window).load(function()
        {
           var phones = [{ "mask": "(###) ###-####"}];
            $('#phone, #phone2').inputmask({
                mask: phones,
                greedy: false,
                definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
        });
    </script>

@stop
