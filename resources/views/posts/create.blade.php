@extends('layouts.app')

@section('content')
    <div id="back">
        <form action="/" method="GET">
            <input type="submit" value="arrow_back_ios" class="material-icons btn btn-default back">
        </form>
    </div>

    <div class="title">
        Create Post
    </div>
    <p>Let your words be heard!</p>

    {{ Form::open(['action' => 'PostsController@store', 'method' => 'POST']) }}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'style' => 'height: 100px;'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
    {{ Form::close() }}
@endsection