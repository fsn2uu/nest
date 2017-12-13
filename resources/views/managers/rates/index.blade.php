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
                <?php $schedule_count = $schedules->count(); $i=1;?>

                <div class="columns">
                    <div class="column">
                        @foreach ($schedules as $schedule)
                            <div class="card m-b-20">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        {{ $schedule->name }}
                                    </p>
                                </header>
                                <div class="card-content">
                                    <div class="content">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Daily Rate</th>
                                                    <th>Weekly Rate</th>
                                                </tr>
                                            </thead>
                                            @foreach ($schedule->rates as $r)
                                                <tr>
                                                    <td>{{ $r->name }}</td>
                                                    <td>{{ $r->start }}</td>
                                                    <td>{{ $r->end }}</td>
                                                    <td>${{ number_format($r->daily, 2) }}</td>
                                                    <td>${{ number_format($r->weekly, 2) }}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <a href="{{ route('managers.rates.show', $schedule->id) }}" class="card-footer-item">Edit</a>
                                </footer>
                            </div>
                            <?php
                            if($i % 3 == 0)
                            {
                                echo '</div><div class="columns">';
                            }

                            $i++;
                            ?>
                        @endforeach
                    </div>
                </div>
            @endif




        </div>
    </div>



@stop
