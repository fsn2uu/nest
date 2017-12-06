@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        {{ $complex->name }}
                    </h1>
                </div>
                <div class="level-right">
                    <a href="{{ route('managers.complexes.destroy', $complex->id) }}" class="button is-danger m-r-15">Delete Complex</a>
                    <form action="{{ route('managers.complexes.destroy', $complex->id) }}" id="deleteForm">
                        {{ method_field('delete') }}
                    </form>
                    <a href="{{ route('managers.complexes.edit', $complex->id) }}" class="button is-primary m-r-15">Edit Complex</a>
                    <a href="{{ route('managers.units.create', ['complex_id' => $complex->id]) }}" class="button is-primary">Add Units</a>
                </div>
            </div>
            @foreach($complex->photos as $r)
                <img src="{{ asset($r->filename) }}" style="max-height:150px;">
            @endforeach
        </div>
    </div>


@stop

@section('scripts')

    <script>
        $(function(){
            $('.is-danger').on('click', function(e){
                e.preventDefault();

                var conf = confirm('Are you sure?  All information, pictures and units attached to this complex will be deleted.  This cannot be undone.');

                if(conf === true)
                {
                    $('#deleteForm').submit();
                }

                return false;
            });
        });
    </script>

@stop
