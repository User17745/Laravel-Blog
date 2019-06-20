@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        {{$post->title}}
    </div>
    <p>{!!$post->body!!}</p>
    <hr style="margin-bottom: 0px;">
    <small>Written on <strong>{{$post->created_at}}</strong></small>
@endsection