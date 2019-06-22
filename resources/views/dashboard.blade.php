@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm">
            
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
    </div>
@endsection
