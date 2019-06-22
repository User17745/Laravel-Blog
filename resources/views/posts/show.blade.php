@extends('layouts.app')

@section('content')
    <div id="back">
        <form action="/posts" method="GET">
            <input type="submit" value="arrow_back_ios" class="material-icons btn btn-default back">
        </form>
    </div>

    <div class="title">
        {{$post->title}}
    </div>
    <p>{!!$post->body!!}</p>
    <hr style="margin-bottom: 0px;">
    <small>Written on <strong>{{$post->created_at}}</strong> by <strong>{{$post->user->name}}</strong></small>
    <br>
    
    @if(!Auth::guest()) {{-- Hide for guest users --}}
        @if(Auth::user()->id == $post->user_id) {{-- Hide for users other than the author --}}
            <div id="post-options">
                <a href="/posts/{{$post->id}}/edit" class="material-icons btn btn-default">edit</a>

                {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull_right'])}}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('delete', ['class' => 'material-icons btn btn-danger'])}}
                {{Form::close()}}
            </div>
        @endif
    @endif

@endsection