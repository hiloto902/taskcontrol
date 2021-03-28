@extends('layouts.app')

@section('content')
<div class="container">
        

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規アカウント登録</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 @auth
                    <form method="POST" action="{{ route('top/store2') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                                <div class="col-md-6">
                                    <textarea id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                                    {{ old('email') }}
                                    </textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>

                                <div class="col-md-6">
                                    <textarea id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password">
                                    {{ old('password') }}
                                    </textarea>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('role') }}</label>

                                <div class="col-md-6">
                                    <textarea id="role" type="int" class="form-control @error('role') is-invalid @enderror" name="role">
                                    {{ old('role') }}
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
@endsection