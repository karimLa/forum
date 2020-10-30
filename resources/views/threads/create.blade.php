@component('layouts.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create a new Thread') }}</div>

                <div class="card-body">
                    <form action="{{route('store_thread')}}" method="POST">
                        @csrf
                        <div class="from-group">
                            <label for="channel_id">Choose a Channel:</label>
                            <select type="text" class="form-control" name="channel_id" id="channel_id" value="{{old('channel_id')}}" required>
                                <option>Choose One...</option>
                                @foreach ($channels as $channel)
                                    <option value="{{$channel->id}}" {{old('channel_id') == $channel->id ? 'selected' : ''}}>{{$channel->name}}</option>
                                @endforeach
                            </select>
                            @error('channel_id')
                                <p class="text-danger pt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="from-group  mt-4">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}" required>
                            @error('title')
                                <p class="text-danger pt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="from-group mt-4">
                            <label for="body">Body:</label>
                            <textarea type="text" class="form-control" name="body" id="body" rows="8" value="{{old('body')}}" required></textarea>
                            @error('body')
                                <p class="text-danger pt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <button class="mt-4 btn btn-primary" type="submit">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
