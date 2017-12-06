@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Rate Schedules
                    </h1>
                </div>

                <div class="level-right">
                    <a href="{{ route('managers.rates.create') }}" class="button is-primary">Add a Rate Schedule</a>
                </div>
            </div>

            @if($schedules->count() < 1)
                <h3>You have no rate schedules!</h3>
            @else
                <table class="table is-hoverable">
                    @foreach($schedules as $r)
                        <tr>
                            <td>
                                <a href="{{ route('managers.rates.show', $r->id) }}">{{ $r->name }}</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>



@stop
