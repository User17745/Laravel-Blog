@extends('layouts.app')

@section('content')
    <div class="title">
        {{$post->title}}
    </div>
    <p>{!!$post->body!!}</p>
    <hr style="margin-bottom: 0px;">
    <small>Written on <strong>{{$post->created_at}}</strong></small>
    <br>
    <div id="post-options">
        <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

        {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull_right'])}}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {{Form::close()}}
    </div>

@endsection