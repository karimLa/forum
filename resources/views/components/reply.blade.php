<div class="card-header">
    <div class="form-inline">
        <h5 class="flex-grow-1">
            <a href="{{route('profile', $reply->owner)}}">
                {{$reply->owner->name}}
            </a> said {{$reply->created_at->diffForHumans()}}
        </h5>

        <form method="POST" action="/replies/{{$reply->id}}/favorites">
            @csrf
            <button type="submit" class="btn btn-default" {{$reply->isFavorited() ? 'disabled' : ''}}>
                {{$reply->favorites_count}} {{Str::plural('Favorite', $reply->favorites_count)}}
            </button>
        </form>
    </div>
</div>
<div class="card-body">
    <p>{{$reply->body}}</p>
</div>
