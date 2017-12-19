@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Edit Unit</h1>

            <p>
                <button class="button" id="editPhotos"><i class="fa fa-picture-o m-r-10"></i> Edit Photos</button>
            </p>

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
                            <p class="select is-fullwidth">
                                <select name="status" id="status">
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

    <div class="modal {{ Request::has('photos') ? 'is-active' : '' }}" id="photoModal">
        <div class="modal-background"></div>
        <div class="modal-content" style="width:85%; min-height: 300px;">
            <p style="color:white;">
                New photos will appear after you save the unit.
            </p>

            <p style="color:white;" class="m-b-15">
                Drag and drop your photos into the order you want them to appear in.  Click the X in the corner when you're done.
            </p>

            <ul id="sortable">
                @foreach($unit->photos as $photo)
                    <li>
                        <?php
                        $path = 'https://s3.'. env('AWS_REGION') .'.amazonaws.com/';
                        $path .= env('AWS_BUCKET') .'/'. $photo->filename;
                        ?>
                        <img src="{{ $path }}" class="ui-state-default" alt="" style="width:95%;" data-imageId="{{ $photo->id }}">
                    </li>
                @endforeach
            </ul>
        </div>
        <button class="modal-close is-large" onclick="$(this).parent().removeClass('is-active')" aria-label="close"></button>
    </div>



@stop

@section('scripts')

    <script>
        $( function() {
            $( "#sortable" ).sortable({
                stop: function(event, ui)
                {
                    var sortObject = [];

                    $('img').each(function(index){
                        //console.log('Image Id ' + $(this).attr('data-imageId') + ' will be indexed to: ' + index)
                        sortObject.push({id: $(this).attr('data-imageId'), order: index})
                    })

                    axios.post('{{ route("managers.axios.units.photos.reorder") }}', {images: sortObject})
                    .then(function(response){
                        notifications.success('Your photos have been reordered.')
                    })
                    .catch(function(error){
                        console.log(error)
                        notifications.danger('Something went wrong.  Please try again.')
                    })

                    console.log(sortObject)
                }
            });
            $( "#sortable" ).disableSelection();
        } );

        $('.tablink').click(function(){
            var section = $(this).attr('data-section')

            $('.tab-panel').css('display', 'none')

            $('#'+section).css('display', 'block')
        })

        $("#editPhotos").click(function(){
            $('#photoModal').addClass('is-active')
        })
    </script>

@endsection
