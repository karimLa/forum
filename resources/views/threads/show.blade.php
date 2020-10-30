@component('layouts.app')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="#">{{$thread->creator->name}}</a> posted: {{$thread->title}}
                        </h4>
                    </div>

                    <div class="card-body">
                        <p>{{$thread->body}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <div class="card">

                    @foreach ($thread->replies as $reply)
                        <x-reply :reply="$reply"></x-reply>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            @if (auth()->check())
                <div class="col-md-8">
                    <form action="{{$thread->path('replies')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Post</button>
                    </form>
                </div>
            @else
                <p>Please <a href="{{route('login')}}">sign in</a> to participate in this thread.</p>
            @endif
        </div>
    </div>
@endcomponent
