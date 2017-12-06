@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Edit Unit</h1>

            <form action="{{ route('managers.units.update', $unit->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="columns">
                    <div class="column is-three-quarters">
                        @include('managers.units._parts.basicForm')
                    </div>

                    <div class="column is-one-quarter">
                        <h4>Actions</h4>
                        <div class="field">
                            <label for="status" class="label">Status</label>
                            <p class="control">
                                <select name="status" id="status" class="select is-fullwidth">
                                    <option {{ isset($unit) && $unit->status == 'published' ? 'selected' : '' }} value="published">Published</option>
                                    <option {{ isset($unit) && $unit->status == 'draft' ? 'selected' : '' }}{{ !isset($unit) ? 'selected' : '' }} value="draft">Draft</option>
                                    <option {{ isset($unit) && $unit->status == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <p class="help is-danger">
                                        {{ $errors->first('status') }}
                                    </p>
                                @endif
                            </p>
                        </div>

                        @include('managers.units._parts.amenities')

                        <input type="submit" value="Update Unit" class="button is-success is-fullwidth m-t-15">
                    </div>
                </div>
            </form>
        </div>
    </div>



@stop
