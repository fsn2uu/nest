@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="#" id="test" style="display: block;">test</a>
        <div id="testDiv" style="display: block; height: 0px; width: 1000px; background-color: gray; overflow: hidden;">test</div>
        <a href="#" style="display: block;">placeholder</a>
    </div>

@stop

@section('scripts')

    <script>
        $('#test').on('click', function(e){
            e.preventDefault();

            $('#testDiv').animate({
                height:  500
            }, 1000);
        });
    </script>

@stop