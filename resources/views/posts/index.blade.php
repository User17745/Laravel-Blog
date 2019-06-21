@extends('layouts.app')

@section('content')
    <div class="title">
        Posts
    </div>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            @if(($loop->index % 2) == 0)
                <div class="row">
            @endif
            <div class="col-sm">
                @include('inc.post-card')
            </div>
            @if(($loop->index % 2) == 1 || $loop->last)
                </div>
            @endif
        @endforeach
        {{$posts->links()}}
        @else
            <p>No posts here :(</p>
    @endif
@endsection