@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        Posts
    </div>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card" style="margin: 4px;">
                <div class="card-body">
                <h6 class="card-title links"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h6>
                    <small class="card-subtitle mb-2 text-muted">
                        Written on <strong>{{$post->created_at}}</strong>
                    </small>
                </div>
            </div>    
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts here :(</p>
    @endif
@endsection