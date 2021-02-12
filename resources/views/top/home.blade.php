@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="my-3 ml-3" style="padding-bottom:20px">
                            <input type="button" onclick="location.href='./tasks'" value="課題">
                        </div>

                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
