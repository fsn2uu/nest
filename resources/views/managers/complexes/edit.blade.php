@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="content">
            <h1>Edit {{ $complex->name }}</h1>

            <p>
                <button class="button" id="editPhotos"><i class="fa fa-picture-o m-r-10"></i> Edit Photos</button>
            </p>

            <form action="{{ route('managers.complexes.update', $complex->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}

                @include('managers.complexes._parts.baseForm')

                @include('managers.complexes._parts.amenities')

                <input type="submit" class="button is-success" value="Update Complex">
            </form>
        </div>
    </div>

    <div class="modal" id="photoModal">
        <div class="modal-background"></div>
        <div class="modal-content" style="width:85%;">
            <p style="color:white;">
                New photos will appear after you save the complex.
            </p>

            <p style="color:white;" class="m-b-15">
                Drag and drop your photos into the order you want them to appear in.  Click the X in the corner when you're done.
            </p>

            <ul id="sortable">
                @foreach($complex->photos as $photo)
                    <li>
                        <img src="{{ asset($photo->filename) }}" class="ui-state-default" alt="" style="width:95%;" data-imageId="{{ $photo->id }}">
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

                    axios.post('{{ route("managers.axios.complexes.photos.reorder") }}', {images: sortObject})
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

        $("#editPhotos").click(function(){
            $('#photoModal').addClass('is-active')
        })
    </script>

@stop
