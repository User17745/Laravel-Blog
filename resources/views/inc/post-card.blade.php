<div class="card" style="margin: 4px;">
    <div class="card-body">
    <h6 class="card-title links"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h6>
        <small class="card-subtitle mb-2 text-muted">
            Written on <strong>{{$post->created_at}}</strong> by <strong>{{$post->user->name}}</strong>
        </small>
    </div>
</div>