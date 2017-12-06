@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            @if ($limitreached == 'yes')
                <h3>
                    Uh oh.
                </h3>
                <p>It looks like you've reached the limit of your plan.  You'll
                need to delete some units or upgrade your plan to continue.</p>
                <p>
                    <a href="{{ route('managers.settings.index') }}" class="button is-large is-success">Upgrade Now</a>
                </p>
            @else
                <h1>New Unit</h1>

                <form action="{{ route('managers.units.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="columns">
                        <div class="column is-three-quarters">
                            @include('managers.units._parts.basicForm')
                        </div>

                        <div class="column is-one-quarter">
                            <h4>Actions</h4>
                            <div class="field">
                                <label for="status" class="label">Status</label>
                                <p class="select is-fullwidth">
                                    <select name="status" id="status" class="select is-fullwidth">
                                        <option value="published">Published</option>
                                        <option value="draft" selected>Draft</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <p class="help is-danger">
                                            {{ $errors->first('status') }}
                                        </p>
                                    @endif
                                </p>
                            </div>

                            @include('managers.units._parts.amenities')

                            <input type="submit" value="Create Unit" class="button is-success is-fullwidth m-t-15">
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>




       {{--  <input type="submit" class="btn btn-primary" value="Create Unit">
    </form> --}}

@stop
