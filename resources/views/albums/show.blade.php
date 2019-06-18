@extends('layouts.app')

@section('content')
<a href="/album" class="btn btn-secondary">Go Back</a>
<a href="/photos/create/{{$album->id}}" class="btn btn-primary">Upload photos to album</a>
<hr>
    @if(count($album->photos) > 0)
        <div class="row">
            @foreach($album->photos as $photo)
                <div class=" col-6 col-md-4 col-lg-3">
                    <div class="card ">
                        <img class="card-img-top" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{$photo->title}}</h4>
                            <p class="card-text">{{$photo->description}}</p>
                            {!! Form::open(['action' => ['photosController@destroy',$photo->id],'method'=>'POST']) !!}
                            {{Form::hidden('_method',"DELETE")}}

                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h5>This album has no images</h5>
    @endif

@endsection