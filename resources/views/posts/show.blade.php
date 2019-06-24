@extends('layouts.app')

@section('content')
    <div id="back">
        <form action="/posts" method="GET">
            <input type="submit" value="arrow_back_ios" class="material-icons btn btn-default back">
        </form>
    </div>

    @if ($post->cover_img != '')
        <div class="title" style="background-image: url('/storage/cover_imgs/{{$post->cover_img}}')">    
    @else
        <div class="title" style="background-image: url('/storage/cover_imgs/default_cover.jpg')">
    @endif
    
        {{$post->title}}
    </div>
    <p>{!!$post->body!!}</p>
    <hr style="margin-bottom: 0px; width: 200px;">
    <small>Written on <strong>{{$post->created_at}}</strong> by <strong>{{$post->user->name}}</strong></small>
    <br>
    
    @if(!Auth::guest()) {{-- Hide for guest users --}}
        @if(Auth::user()->id == $post->user_id) {{-- Hide for users other than the author --}}
            <div id="post-controls">
                <div id="post-options" style="display: block;">
                    <a href="/posts/{{$post->id}}/edit" class="material-icons btn btn-default">edit</a>
                    <br>
                    <a onclick="deletePostConfirm()" class="material-icons btn btn-danger">delete</a>
                </div>
                <div id="delete-confirmation">
                    <div id="delete-confirmation-message">
                        <p>Are you sure you want to delete this post?</p>
                    </div>
                    <div id="delete-confirmation-options">
                        
                        {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull_right'])}}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('DELETE', ['id' => 'delete-confirmation-delete', 'class' => 'btn btn-danger', 'onClick' => 'deletePostConfirm()', 'style' => 'cursor: pointer; border: none; font-size: 13px; color: #e91e63; float: right;'])}}
                        {{Form::close()}}
                        
                        <a id="delete-confirmation-cancel" onClick="deletePostConfirm()" class="btn btn-default" style="cursor: pointer; border: none; font-size: 13px; float: right;">
                            CANCEL
                        </a>
                        <div class="clear-fix" style="clear: both;"></div>
                    </div>
                </div>
            </div>

            <script>
                function deletePostConfirm(){
                    var postOptionsIcons = document.getElementById('post-options');
                    var deleteConfirmation = document.getElementById('delete-confirmation');

                    if(postOptionsIcons.style.display == 'block'){
                        postOptionsIcons.style.animation = "fadeout .5s";
                        deleteConfirmation.style.animation = "fadein .5s";

                        postOptionsIcons.style.display = 'none';
                        deleteConfirmation.style.display = 'block';
                    }
                    else{
                        postOptionsIcons.style.animation = "fadein .5s";
                        deleteConfirmation.style.animation = "fadeout .5s";

                        postOptionsIcons.style.display = 'block';
                        deleteConfirmation.style.display = 'none';
                    }
                }
            </script>
        @endif
    @endif
@endsection