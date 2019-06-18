@extends('layouts.app')

@section('content')
    @if(count($albums) > 0)
        <div id="albums">
            <div class="row text-center">
                @foreach($albums as $album)
                
                    <div class='col-6 col-md-4 col-lg-3 mb-4'>
                        <a href="/album/{{$album->id}}">
                            <img class="img-thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                        </a>
                        <br>
                        <h4>{{$album->name}}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No Albums To Display</p>
    @endif

@endsection