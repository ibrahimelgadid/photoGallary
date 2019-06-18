@extends('layouts.app')

@section('content')

    <h1>Upload photo</h1>

    {!! Form::open(['action' => 'photosController@store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Photo title')}}
            {{Form::text(
                'title', '',[
                    'class'=>'form-control',
                    'placeholder'=>'photo title'
                    ]
            )}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea(
                'description', '',[
                    'class'=>'form-control',
                    'placeholder'=>'photo Description'
                    ]
                )}}
        </div>
        {{Form::hidden('album_id', $album_id)}}
        <div class="form-group">
            {{Form::file('photo')}}
        </div>
        <div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}

@endsection
