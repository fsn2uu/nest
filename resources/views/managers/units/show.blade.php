@extends('layouts.app')

@section('content')

    Todo:<br>
    <ol>
        <li>
            get a freaking domain name.
        </li>
        <li>
            move photos to amazon s3
            <ol>
                <li>
                    https://www.youtube.com/watch?v=HDxCDdZFh9g
                </li>
                <li>
                    https://laravel.com/docs/5.4/filesystem
                </li>
                <li>
                    https://github.com/thephpleague/flysystem-aws-s3-v3
                </li>
            </ol>
        </li>
        <li>
            get reservations working
        </li>
    </ol>

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
                    {{ \App\Helpers\Calendar::draw('12', '2017', $unit->id) }}

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
                    <a href="{{ route('managers.units.edit', $unit->id) }}" class="button is-primary is-fullwidth m-b-15">Edit this Unit</a>
                    <a class="button is-danger is-fullwidth">Delete this Unit</a>
                </div> {{-- /.column .is-one-quarter --}}
            </div> {{-- /.columns --}}
        </div> {{-- /.content --}}
    </div> {{-- /.container --}}

    <form action="{{ route('managers.units.destroy', $unit->id) }}" method="post" id="deleteForm">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>

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

    $('.is-danger').click(function(e){
        e.preventDefault();
        modalConfirm(
        "Are you sure?",
        "<p>Are you sure you want to do this?  There are no whoopsies!</p>",
            function()
            {
                $('#deleteForm').submit();
            },
            function()
            {}
        )
    });
    </script>

@endsection
