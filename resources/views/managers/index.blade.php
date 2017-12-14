@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Dashboard</h1>

            <h3>Reservations</h3>

            <div class="columns">
                <div class="column is-one-fifth"></div>
                <div class="column has-text-centered">2 weeks</div>
            </div>

            @foreach($units as $unit)
                <div class="columns">
                    <div class="column is-one-fifth">{{ $unit->name }}</div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span class="unitReserved">30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                    <div class="column"><span>30</span></div>
                </div>
            @endforeach


        </div>
    </div>

@stop
