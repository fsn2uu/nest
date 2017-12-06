@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Companies
                    </h1>
                </div>
                <div class="level-right">
                    <a href="{{ route('cysy.companies.create') }}" class="button is-primary">Add a Company</a>
                </div>
            </div>

            @if($companies->count() < 1)
                <h3>There are no companies to display.</h3>
            @else
                <table class="table is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Managers</th>
                            <th>Complexes</th>
                            <th>Units</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Phone</th>
                            <th>Website</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    @foreach($companies as $company)
                        <tr>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->users->count() }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->complexes->count() }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->units->count() }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->city }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->state }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->phone }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ $company->url }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('cysy.companies.show', $company->id) }}">
                                    {{ ucwords($company->status) }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@stop
