@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <div class="level">
                <div class="level-left">
                    <h1>
                        Users
                    </h1>
                </div>

                <div class="level-right">
                    <a href="{{ route('cysy.users.create') }}" class="button is-primary">Add a User</a>
                </div>
            </div>

            @if($users->count() < 1)
                <h3>There are no users to display.</h3>
            @else
                <table class="table is-striped is-hoverable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>User Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                @if($user->hasRole('cysy'))
                                    CYSY
                                @elseif(isset($user->company->name))
                                    {{ $user->company->name }}
                                @else
                                    n/a
                                @endif
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                @if($user->hasRole('cysy'))
                                    CYSY
                                @elseif($user->hasRole('managers'))
                                    Manager
                                @elseif($user->hasRole('owners'))
                                    Owner
                                @else
                                    Traveler
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('cysy.users.show', $user->id) }}" class="button"><i class="fa fa-fw fa-info"></i></a>
                                <a href="{{ route('cysy.users.edit', $user->id) }}" class="button"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="{{ route('cysy.users.destroy', $user->id) }}" data-id="delete{{ $user->id }}" class="button is-danger"><i class="fa fa-fw fa-trash"></i></a>
                                <form action="{{ route('cysy.users.destroy', $user->id) }}" id="delete{{ $user->id }}">
                                    {{ method_field('delete') }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>

@stop

@section('scripts')

    <script>
        $(function(){
            $('.is-danger').on('click', function(e){
                e.preventDefault();

                var conf = confirm('Are you sure you want to do this?  There are no whoopsies!');

                if(conf === true)
                {
                    var formId = $(this).data('id');
                    $('#' + formId).submit();
                }
            });
        });
    </script>

@stop
