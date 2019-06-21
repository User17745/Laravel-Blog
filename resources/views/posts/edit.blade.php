@extends('layouts.app')

@section('content')
    <div class="title">
        Edit Post
    </div>
    <p>Make the desired changes here.</p>

    {{ Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) }}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
                {{Form::label('body', 'Body')}}
                {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'style' => 'height: 100px;'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-default'])}}
    {{ Form::close() }}
@endsection