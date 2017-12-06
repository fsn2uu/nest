@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>{{ $schedule->name }}</h1>

            <form action="{{ route('managers.rates.update', $schedule->id) }}" method="post">
                <input type="hidden" name="_method" value="put">
                {{ csrf_field() }}

                <div class="field">
                    <label class="label" for="name">Name</label>
                    <input type="text" name="name" id="name" class="input" value="{{ $schedule->name }}" required>
                    <p class="help">
                        Rate schedule names are not visible to travelers.
                    </p>
                </div>
                <h3>Rates</h3>
                <p class="help">
                    Don't add dollar signs to rates; they will be automatically added later.
                </p>
                <?php $i = 0; ?>
                @foreach($schedule->rates as $r)
                    <div class="columns">
                        <div class="column">
                            <label class="label" for="">Name</label>
                            <input type="text" name="old_rates[{{ $r->id }}][name]" class="input" value="{{ $r->name }}">
                        </div>
                        <div class="column">
                            <label class="label" for="">Start Date</label>
                            <input type="text" name="old_rates[{{ $r->id }}][start]" class="input datepicker" value="{{ \Carbon\Carbon::parse($r->start)->format('m-d-Y') }}">
                        </div>
                        <div class="column">
                            <label class="label" for="">End Date</label>
                            <input type="text" name="old_rates[{{ $r->id }}][end]" class="input datepicker" value="{{ \Carbon\Carbon::parse($r->end)->format('m-d-Y') }}">
                        </div>
                        <div class="column">
                            <label class="label" for="">Daily Rate</label>
                            <input type="text" name="old_rates[{{ $r->id }}][daily]" class="input" value="{{ $r->daily }}">
                        </div>
                        <div class="column">
                            <label class="label" for="">Weekly Rate</label>
                            <input type="text" name="old_rates[{{ $r->id }}][weekly]" class="input" value="{{ $r->weekly }}">
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach

                <div class="field" id="app2">
                    <a class="button is-large is-success" id="appender" v-on:click="testMessage" alt="Add a New Row" title="Add a New Row"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
                </div>

                <input type="submit" value="Update Schedule" class="button is-primary">
            </form>
        </div>
    </div>

@stop
