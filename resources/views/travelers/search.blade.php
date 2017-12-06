@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Find Your Vacation Destination</h1>

            <form action="">
                <div class="level">
                    <div class="field">
                        <div class="control">
                            <input type="text" name="" id="" class="input" placeholder="City, Zip Code, etc.">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="text" name="start" id="start" class="input" placeholder="Arrival Date">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input type="text" name="end" id="end" class="input" placeholder="Departure Date">
                        </div>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="adults" id="adults">
                                <option value="">Adults</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="kids" id="kids">
                                <option value="">Kids</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <div class="select">
                            <select name="kids" id="kids">
                                <option value="">Kids</option>
                            </select>
                        </div>
                    </div>
                    <button class="button is-success is-large"><i class="fa fa-search fa-3"></i></button>
                </div>
            </form>

            @if ($units->count() < 1)
                <h3>Sorry, we couldn't find any units that match your search.</h3>
            @else
                <?php $i = 0; ?>
                <div class="level">
                    <div class="level-left">
                        @foreach($units as $unit)
                            <div class="level-item">
                                <div class="card" style="width:385px;">
                                    <div class="card-image">
                                        <figure class="image is-4by3" style="margin-left:0; margin-right:0;">
                                            <a href="{{ route('show', $unit->id) }}">
                                                <img src="{{ asset(@$unit->photos->first()->filename) }}" onerror="this.src='https://placehold.it/1280x960'" alt="Placeholder image">
                                            </a>
                                        </figure>
                                    </div> {{-- /.card-image --}}

                                    <div class="card-content">
                                        <div class="content has-text-centered">
                                            <h3>
                                                {{ isset($unit->complex) ? $unit->complex->name.' ' : '' }}
                                                {{ $unit->name ? $unit->name.' ' : '' }}
                                                {{ $unit->unit_no ? 'Unit '.$unit->unit_no : '' }}
                                            </h3>

                                            <div class="columns">
                                                <div class="column">
                                                    <strong>Beds:</strong> {{ $unit->beds }}
                                                </div>
                                                <div class="column">
                                                    <strong>Baths:</strong> {{ $unit->baths }}
                                                </div>
                                                <div class="column">
                                                    <strong>Sleeps:</strong> {{ $unit->sleeps }}
                                                </div>
                                            </div> {{-- /.columns --}}

                                            <div class="columns">
                                                <div class="column">
                                                    {{ ucwords($unit->city ?: $unit->complex->city) }}
                                                </div>
                                                <div class="column">
                                                    {{ ucwords($unit->type) }}
                                                </div>
                                            </div> {{-- /.columns --}}
                                        </div> {{-- /.content --}}
                                    </div> {{-- /.card-content --}}

                                    <footer class="card-footer">
                                        <a href="{{ route('show', $unit->id) }}" class="card-footer-item">More Info</a>
                                        <a href="#" class="card-footer-item">Favorite</a>
                                        <a href="#" class="card-footer-item">Book Now</a>
                                    </footer>
                                </div> {{-- /.card --}}
                            </div> {{-- /.level-item --}}

                            <?php $i++; ?>

                            @if ($i % 3 == 0)
                                </div>
                                </div>
                                <div class="level">
                                <div class="level-left">
                            @endif
                        @endforeach
                    </div> {{-- /.level-left --}}
                </div> {{-- /.level --}}
            @endif


        </div> {{-- /.content --}}
    </div> {{-- /.container --}}

@endsection

@section('scripts')

    <script>
        $(function(){
            $('#start').datepicker({
                minDate: 0,
                onSelect: function (date)
                {
                    var date2 = $('#start').datepicker('getDate')
                    date2.setDate(date2.getDate() + 2)
                    $('#end').datepicker('setDate', date2)
                    $('#end').datepicker('option', 'minDate', date2)
                }
            })

            $('#end').datepicker({
                minDate: $('#start').val() + 2
            })
        })
    </script>

@endsection
