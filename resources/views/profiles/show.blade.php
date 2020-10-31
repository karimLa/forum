@component('layouts.app')
    <div class="container">
        <div class="col-md-8 offset-2 mt-5">
            <div class="page-header">
                <h1>{{$profileUser->name}} <small>since {{$profileUser->created_at->diffForHumans()}}</small></h1>
            </div>

            @foreach ($threads as $thread)
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row px-3">
                            <h4 class="flex-grow-1">
                                <a href="#">{{$profileUser->name}}</a> posted: {{$thread->title}}
                            </h4>
                            <span>{{$thread->created_at->diffForHumans()}}</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <p>{{$thread->body}}</p>
                    </div>
                </div>
            @endforeach

            {{$threads->links()}}

        </div>
    </div>
@endcomponent
