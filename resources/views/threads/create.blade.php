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
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="from-group mt-4">
                            <label for="body">Body:</label>
                            <textarea type="text" class="form-control" name="body" id="body" rows="8"></textarea>
                        </div>

                        <button class="mt-4 btn btn-primary" type="submit">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endcomponent
