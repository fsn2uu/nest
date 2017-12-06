@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Settings</h1>
            <ul>
                <li>TODO</li>
                <li>Build functionality to change plans</li>
                <li>add ability to cancel subscription</li>
                <li>add ability to update cc info</li>
                <li>add settings
                    <ul>
                        <li>do they want to auto-accept or manually approve reservations</li>
                        <li>age restriction level</li>
                        <li>travelers insurance?</li>
                        <li>security deposit?</li>
                    </ul>
                </li>
            </ul>
            <h3>Nest Subscription Settings</h3>
            <form action="">
                {{ csrf_field() }}
                <div class="select">
                    <select name="plan_id" id="plan_id">
                        <option value="">Select a Plan</option>
                        @foreach ($plans->data as $plan)
                            @if (in_array($plan->id, ['nest-1', 'nest-2', 'nest-3']))
                                <option value="{{ $plan->id }}"
                                    {{ $cplan == $plan->id ? 'selected' : '' }}
                                    >{{ $plan->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

@endsection
