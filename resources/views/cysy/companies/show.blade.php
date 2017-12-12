@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        {{ $company->name }}
                    </h1>
                </div>

                <div class="level-right">
                    <a href="{{ route('cysy.companies.edit', $company->id) }}" class="button is-primary">Edit Company</a>
                </div>
            </div>

            <div class="columns">
                <div class="column is-one-quarter">
                    <img src="{{ asset(@$company->logo->filename) }}" style="width: 100%;">
                </div>

                <div class="column">
                    <table class="table">
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td>{{ $company->phone }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td>
                                {{ $company->address }}<br>
                                {{ ($company->address2) ? $company->address.'<br>' : '' }}
                                {{ $company->city }}, {{ $company->state }} {{ $company->zip }}
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Website:</strong></td>
                            <td>{{ $company->url }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status:</strong></td>
                            <td>{{ $company->status }}</td>
                        </tr>
                        <tr>
                            <td><strong>Managers:</strong></td>
                            <td>
                                @if($company->users->count() < 1)
                                    There are no admins to display.
                                @else
                                    @foreach($company->users as $r)
                                        <a href="{{ route('cysy.users.show', $r->id) }}">
                                            <img src="{{ $r->get_gravatar($r->email) }}" onerror="this.onerror=null;this.src='{{ asset('assets/person.png') }}'">
                                        </a>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')

    <script>
    $('.is-danger').click(function(e){
        e.preventDefault();
        modalConfirm(
        "Are you sure?",
        "<p>Are you sure you want to do this?  There are no whoopsies!</p>",
            function()
            {
                var formId = $(this).data("id");

                $("#" + formId).submit();
            },
            function()
            {}
        )
    });
    </script>

@endsection
