@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="columns">
                <div class="column is-three-quarters">
                    <h1>
                        {{ $complex->name }}
                    </h1>

                    <ul id="lightSlider">
                        @foreach ($complex->photos as $photo)
                            <li>
                                <img src="{{ asset($photo->filename) }}" alt="Placeholder image">
                            </li>
                        @endforeach
                    </ul>

                    <p>{!! nl2br($complex->description) !!}</p>

                    <h3>{{ $complex->name }} has {{ $complex->units_count }} units</h3>

                    @if ($complex->amenities)
                        <h3>Complex Amenities</h3>
                        {{ $complex->amenities }}
                    @endif

                    <h3>Rates</h3>
                    @if ($complex->schedule)
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
                                @foreach ($complex->schedule->rates as $r)
                                    <tr>
                                        <td>{{ $r->name }}</td>
                                        <td>{{ $r->start }}</td>
                                        <td>{{ $r->end }}</td>
                                        <td>${{ number_format($r->daily, 2) }}</td>
                                        <td>${{ number_format($r->weekly, 2) }}</td>
                                    </tr>
                                @endforeach
                        </table>
                    @else
                        <p>There is no rate schedule attached to this complex.</p>
                    @endif
                </div>

                <div class="column is-one-quarter">
                    <a href="{{ route('managers.complexes.destroy', $complex->id) }}" class="button is-danger is-fullwidth m-b-15">Delete Complex</a>
                    <form action="{{ route('managers.complexes.destroy', $complex->id) }}" id="deleteForm">
                        {{ method_field('delete') }}
                    </form>
                    <a href="{{ route('managers.complexes.edit', $complex->id) }}" class="button is-primary is-fullwidth m-b-15">Edit Complex</a>
                    <a href="{{ route('managers.units.create', ['complex_id' => $complex->id]) }}" class="button is-primary is-fullwidth m-b-15">Add Units</a>
                </div>
            </div>
        </div>
    </div>


@stop

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
            "<p>Are you sure you want to do this?  There are no whoopsies!</p><p><strong>All information, pictures and units attached to this complex will be deleted.</strong></p>",
                function()
                {
                    $('#deleteForm').submit();
                },
                function()
                {}
            )
        });
    </script>

@stop
