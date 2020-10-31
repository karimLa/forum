@component('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($threads as $thread)
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row px-3">
                            <h4 class="flex-grow-1">
                                <a href="{{$thread->path()}}">
                                    {{$thread->title}}
                                </a>
                            </h4>
                            <a href="{{$thread->path()}}">
                                {{$thread->replies_count}} {{Str::plural('reply', $thread->replies_count)}}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{$thread->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endcomponent
