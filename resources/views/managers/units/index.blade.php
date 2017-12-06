@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Units
                    </h1>
                </div>
                <div class="level-right">
                    <a href="{{ route('managers.units.create') }}" class="button is-primary">Add a Unit</a>
                </div>
            </div>

            @if($units->count() < 1)
                <h3>You don't have any units yet!</h3>
            @else
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>Unit Name</th>
                            <th>Complex Name</th>
                            <th>Unit Number</th>
                            <th>Date Listed</th>
                            <th>Last Modified</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    @foreach($units as $unit)
                        <tr>
                            <td>
                                <a href="{{ route('managers.units.show', $unit->id) }}">
                                    {{ isset($unit->complex) ? $unit->complex->name.' ' : '' }}
                                    {{ $unit->name ? $unit->name.' ' : '' }}
                                    {{ $unit->unit_no ? 'Unit '.$unit->unit_no : '' }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('managers.units.show', $unit->id) }}">{{ ucwords(@$unit->complex->name) }}</a>
                            </td>
                            <td>
                                <a href="{{ route('managers.units.show', $unit->id) }}">{{ ucwords(@$unit->unit_no) }}</a>
                            </td>
                            <td>
                                <a href="{{ route('managers.units.show', $unit->id) }}">{{ ucwords($unit->created_at->format('m-d-Y')) }}</a>
                            </td>
                            <td>
                                <a href="{{ route('managers.units.show', $unit->id) }}">{{ ucwords($unit->updated_at->format('m-d-Y')) }}</a>
                            </td>
                            <td>
                                <a href="{{ route('managers.units.show', $unit->id) }}">{{ ucwords($unit->status) }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@stop
