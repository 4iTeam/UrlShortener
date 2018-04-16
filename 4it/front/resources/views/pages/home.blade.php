@extends('front::layouts.app')
@section('content')
    <div class="card" id="short-url">
        <div class="card-header">Create a short url</div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="form-group row" :class="submit?'was-validated':''">
                    <label for="longUrl" class="col-sm-4 col-form-label text-md-right">{{ __('Url') }}</label>

                    <div class="col-md-6">

                        <div class="input-group">
                            <input v-model="longUrl" placeholder="Paste a link to shorten it!" id="longUrl" type="url"
                                    class="form-control{{ $errors->has('longUrl') ? ' is-invalid' : '' }}" name="longUrl"
                                   value="{{ old('longUrl') }}" required autofocus>
                            <div class="invalid-tooltip">
                                <strong>Please enter valid url</strong>
                            </div>
                            <div class="input-group-append">
                                <button :disabled="loading" class="btn btn-outline-secondary" type="button" @click="make">Shorten</button>
                            </div>
                        </div>

                        <div v-if="shortUrl">
                            Your shorten url: <input readonly v-model="shortUrl">
                        </div>


                    </div>

                </div>
            </form>
        </div>
    </div>


    <div id="result" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var apiUrl="{{ route('api.short') }}";
        var apiKey="{{$apiKey}}";
    </script>
    <script src="{{ asset('js/home.js') }}" defer></script>
@endsection