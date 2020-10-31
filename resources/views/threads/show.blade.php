@component('layouts.app')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row px-3">
                            <h4 class="flex-grow-1">
                                <a href="{{route('profile', $thread->creator)}}">{{$thread->creator->name}}</a> posted:
                                <a href="{{$thread->path()}}">{{$thread->title}}</a>
                            </h4>
                            @can('update', $thread)
                                <form action="{{$thread->path()}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Delete Thread</button>
                                </form>
                            @endcan
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{$thread->body}}</p>
                    </div>
                </div>
                @foreach ($replies as $reply)
                    <div class="card my-2">
                        <x-reply :reply="$reply"></x-reply>
                    </div>
                @endforeach

                {{$replies->links()}}

                @if (auth()->check())
                    <form action="{{$thread->path() . '/replies'}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Post</button>
                    </form>
                @else
                    <p>Please <a href="{{route('login')}}">sign in</a> to participate in this thread.</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            This thread was published {{$thread->created_at->diffForHumans()}} by
                            <a href="#">{{$thread->creator->name}}</a>, and currently has {{$thread->replies_count}} {{Str::plural('comment', $thread->replies_count)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endcomponent
