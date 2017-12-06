@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Complexes
                    </h1>
                </div>
                <div class="level-right">
                    <a href="{{ route('managers.complexes.create') }}" class="button is-primary">Add a Complex</a>
                </div>
            </div>
            @if($complexes->count() < 1)
                <h3>You don't have any complexes yet!</h3>
            @else
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Unit Count</th>
                            <th>Phone</th>
                            <th>Phone 2</th>
                            <th>Website</th>
                        </tr>
                    </thead>
                    @foreach($complexes as $complex)
                        <tr>
                            <td>
                                <a href="{{ route('managers.complexes.show', $complex->id) }}">
                                    {{ $complex->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('managers.complexes.show', $complex->id) }}">
                                    {{ $complex->units->count() }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('managers.complexes.show', $complex->id) }}">
                                    {{ $complex->phone }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('managers.complexes.show', $complex->id) }}">
                                    {{ $complex->phone2 }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('managers.complexes.show', $complex->id) }}">
                                    {{ $complex->url }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@stop
