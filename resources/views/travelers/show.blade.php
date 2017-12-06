@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/lightslider.min.css') }}">

    <div class="container">
        <div class="content">
            <div class="columns">
                <div class="column is-three-quarters">
                    <h1>
                        {{ isset($unit->complex) ? $unit->complex->name.' ' : '' }}
                        {{ $unit->name ? $unit->name.' ' : '' }}
                        {{ $unit->unit_no ? 'Unit '.$unit->unit_no : '' }}
                    </h1>

                    <ul id="lightSlider">
                        @foreach ($unit->photos as $photo)
                            <li>
                                <img src="{{ asset($photo->filename) }}" alt="Placeholder image">
                            </li>
                        @endforeach
                    </ul>

                    <div class="columns">
                        <div class="column has-text-centered">
                            <strong>Beds:</strong> {{ $unit->beds }}
                        </div>

                        <div class="column has-text-centered">
                            <strong>Baths:</strong> {{ $unit->baths }}
                        </div>

                        <div class="column has-text-centered">
                            <strong>Sleeps:</strong> {{ $unit->sleeps }}
                        </div>

                        <div class="column has-text-centered">
                            <strong>Type:</strong> {{ $unit->type }}
                        </div>

                        <div class="column has-text-centered">
                            <strong>Pet Friendly:</strong> {{ $unit->pet_friendly == 1 ? 'Yes' : 'No' }}
                        </div>

                    </div>

                    {!! nl2br($unit->description) !!}

                    @if ($unit->amenities)
                        <h3>Unit Amenities</h3>
                        {{ $unit->amenities }}
                    @endif

                    @if (@$unit->complex->amenities)
                        <h3>Complex Amenities</h3>
                        {{ $unit->complex->amenities }}
                    @endif

                    <h3>Availability</h3>
                    [AVAIL CALENDARS GO HERE]

                    <h3>Rates</h3>
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
                        @if ($unit->schedule)
                            @foreach ($unit->schedule->rates as $r)
                                <tr>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->start }}</td>
                                    <td>{{ $r->end }}</td>
                                    <td>${{ number_format($r->daily, 2) }}</td>
                                    <td>${{ number_format($r->weekly, 2) }}</td>
                                </tr>
                            @endforeach
                        @elseif ($unit->complex->schedule)
                            @foreach ($unit->complex->schedule->rates as $r)
                                <tr>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->start }}</td>
                                    <td>{{ $r->end }}</td>
                                    <td>${{ number_format($r->daily, 2) }}</td>
                                    <td>${{ number_format($r->weekly, 2) }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div> {{-- /.column .is-three-quarters --}}

                <div class="column is-one-quarter">
                    <h3>Book Now</h3>
                    <form action="#">
                        {{ csrf_field() }}

                        <input type="hidden" name="unit_id" value="{{ $unit->id }}">

                        <div class="field">
                            <div class="control">
                                <input type="text" name="arrive" id="arrive" class="input" placeholder="Arrival Date">
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <input type="text" name="depart" id="depart" class="input" placeholder="Departure Date">
                            </div>
                        </div>

                        <div class="field">
                            <div class="select is-fullwidth">
                                <select name="adults" id="adults">
                                    <option value="">Select # Adults</option>
                                    @for ($i=1; $i <= 15; $i++)
                                        <option value="{{ $i }}">{{ $i }}{{ $i == 15 ? '+' : '' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <div class="select is-fullwidth">
                                <select name="kids" id="kids">
                                    <option value="">Select # Kids</option>
                                    @for ($i=1; $i <= 15; $i++)
                                        <option value="{{ $i }}">{{ $i }}{{ $i == 15 ? '+' : '' }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <button class="button is-success is-outlined is-fullwidth">Book Now</button>
                    </form>

                    <h3>Rental Managed By</h3>
                    <a href="{{ !strstr($unit->company->url, 'http://') ? 'http://' : '' }}{{ !strstr($unit->company->url, 'www.') ? 'www.' : '' }}{{ $unit->company->url }}" target="_blank">
                        <figure class="image is-fullwidth" style="margin-left:0; margin-right:0;">
                            <img src="{{ asset($unit->company->logo->filename) }}" alt="Placeholder image">
                        </figure>
                    </a>

                    <h4 class="has-text-centered">
                        {{ $unit->company->name }}
                    </h4>

                    <div class="columns has-text-centered">
                        <div class="column">
                            <a href="#" class="button">
                                <i class="fa fa-search m-r-10"></i> Our Units
                            </a>
                        </div>

                        <div class="column">
                            <a href="#" class="button">
                                <i class="fa fa-envelope m-r-10"></i> Ask a Question
                            </a>
                        </div>
                    </div>
                </div> {{-- /.column .is-one-quarter --}}
            </div> {{-- /.columns --}}
        </div> {{-- /.content --}}
    </div> {{-- /.container --}}

@endsection

@section('scripts')

    <script src="{{ asset('js/lightslider.min.js') }}"></script>
    <script>
    $('#lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        slideMargin: 0,
        thumbItem: 9,
        auto: true,
        pause: 3000
    });
    </script>

@endsection
