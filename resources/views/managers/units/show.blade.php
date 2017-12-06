@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        {{ isset($unit->complex) ? $unit->complex->name.' ' : '' }}
                        {{ $unit->name ? $unit->name.' ' : '' }}
                        {{ $unit->unit_no ? 'Unit '.$unit->unit_no : '' }}
                    </h1>
                </div>

                <div class="level-right">
                    <a href="{{ route('managers.units.edit', $unit->id) }}" class="button is-primary">Edit this Unit</a>
                </div>
            </div>

            @if($unit->description)
                <h3>Unit Details</h3>
                {!! nl2br($unit->description) !!}
            @endif

            <p>Bedrooms: {{ $unit->beds }}</p>
            <p>Bathrooms: {{ $unit->baths }}</p>
            <p>Sleeps: {{ $unit->sleeps }}</p>

            @if($unit->address)
                <h3>Directions</h3>
                <p>
                    {{ $unit->address }}{{ ($unit->unit_no) ? ' Unit '.$unit->unit_no : '' }}<br>
                    @if($unit->address2)
                        {{ $unit->address2 }}<br>
                    @endif
                    {{ $unit->city }}, {{ $unit->state }}  {{ $unit->zip }}
                </p>
            @elseif($unit->complex_id)
                <h3>Directions</h3>
                <p>
                    {{ $unit->complex->address }}<br>
                    @if($unit->complex->address2)
                        {{ $unit->complex->address2 }}<br>
                    @endif
                    {{ $unit->complex->city }}, {{ $unit->complex->state }}  {{ $unit->complex->zip }}
                </p>
            @endif
        </div>
    </div>

@stop
