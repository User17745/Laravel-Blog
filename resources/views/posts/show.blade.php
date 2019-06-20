@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        {{$post->title}}
    </div>
    <small>Written on <strong>{{$post->created_at}}</strong></small>
    <p>{{$post->body}}</p>
@endsection