<div class="container">
        

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">課題の追加</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 @auth
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('課題') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('質問') }}</label>

                                <div class="col-md-6">
                                    <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment">
                                    {{ old('comment') }}
                                    </textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('登録') }}
                                    </button>
                                </div>
                        </div>
                    </form> 
                    @endauth  

                </div>
            </div>
        </div>
    </div>
</div>