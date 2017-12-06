@extends('layouts.admin')

@section('content')

    <h1>{{ $schedule->name }}</h1>

    <form action="{{ route('admin.rates.update', $schedule->id) }}" method="post">
        <input type="hidden" name="_method" value="put">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $schedule->name }}" required>
            <small class="form-text text-muted">
              Rate schedule names are not visible to travelers.
            </small>
        </div>
        <h3>Rates</h3>
        <small class="form-text text-muted">
            Don't add dollar signs to rates; they will be automatically added later.
        </small>
        <?php $i = 0; ?>
        @foreach($schedule->rates as $r)
            <div class="row input-rows">
                <div class="col">
                    <label for="">Name</label>
                    <input type="text" name="old_rates[{{ $r->id }}][name]" class="form-control" value="{{ $r->name }}">
                </div>
                <div class="col">
                    <label for="">Start Date</label>
                    <input type="text" name="old_rates[{{ $r->id }}][start]" class="form-control datepicker" value="{{ \Carbon\Carbon::parse($r->start)->format('m-d-Y') }}">
                </div>
                <div class="col">
                    <label for="">End Date</label>
                    <input type="text" name="old_rates[{{ $r->id }}][end]" class="form-control datepicker" value="{{ \Carbon\Carbon::parse($r->end)->format('m-d-Y') }}">
                </div>
                <div class="col">
                    <label for="">Daily Rate</label>
                    <input type="text" name="old_rates[{{ $r->id }}][daily]" class="form-control" value="{{ $r->daily }}">
                </div>
                <div class="col">
                    <label for="">Weekly Rate</label>
                    <input type="text" name="old_rates[{{ $r->id }}][weekly]" class="form-control" value="{{ $r->weekly }}">
                </div>
            </div>
            <?php $i++; ?>
        @endforeach

        <div class="form-group" style="margin-top: 15px;" id="appendTarget">
            <a href="#" class="btn btn-lg btn-success" id="appender" alt="Add a New Row" title="Add a New Row"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
        </div>

        <input type="submit" value="Update Schedule" class="btn btn-primary">
    </form>

@stop