@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
            <a href="/posts/create" class="btn btn-default" style="font-size: 1rem; margin: 5px;">Create Post</a>
        </div>    

        <div class="col-md">
            @if (count($posts) > 0)
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr>
                            <th><a href="/posts/{{$post->id}}" class="link">{{$post->title}}</a></th>
                            <th><a href="/posts/{{$post->id}}/edit" class="material-icons btn btn-default">edit</a></th>
                            <th>
                                {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull_right'])}}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('delete', ['class' => 'material-icons btn btn-danger'])}}
                                {{Form::close()}}    
                            </th>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>No posts here 😢</p>
            @endif
        </div>
    </div>
@endsection
