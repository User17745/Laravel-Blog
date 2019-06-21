@extends('layouts.app')

@section('content')
    <div id="back">
        <form action="/" method="GET">
            <input type="submit" value="arrow_back_ios" class="material-icons btn btn-default back">
        </form>
    </div>

    <div class="title">
        {{$title}}
    </div>
    <p>This is my services page.</p>
            
    <div class="links">
        <a href="/">Home</a>
        <a href="/about">About</a>
    </div>
            
    @if(count($services) > 0)
        <ul class="list-group" style="text-align: left; margin-top: 25px;">
            @foreach ($services as $service)
                <li class="list-group-item">{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
        