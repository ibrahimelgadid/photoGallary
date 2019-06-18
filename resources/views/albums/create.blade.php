@extends('layouts.app')

@section('content')

    <h1>Create new album</h1>

    {!! Form::open(['action' => 'albumsController@store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Album name')}}
            {{Form::text(
                'name', '',[
                    'class'=>'form-control',
                    'placeholder'=>'Album name'
                    ]
            )}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea(
                'description', '',[
                    'class'=>'form-control',
                    'placeholder'=>'Album Description'
                    ]
                )}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        <div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
        </div>
    {!! Form::close() !!}

@endsection
