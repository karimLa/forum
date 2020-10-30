@component('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Forum Threads') }}</div>

                <div class="card-body">
                    @foreach ($threads as $thread)
                        <article>
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
                            <p>{{$thread->body}}</p>
                        </article>

                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
