@extends('layouts.app')

@section('content')
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
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('対象') }}</label>

                                <div class="col-md-6">
                                    <input id="sns_name" type="text" class="form-control @error('sns_name') is-invalid @enderror" name="sns_name" value="{{ old('sns_name') }}">

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


                <div class="container-fluid">
                <div class="row">   
                
                <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{url('/tasks/search')}}" method="post">
                    @csrf
                    <div class="form-group">
                    <input type="text" name="word" @isset($keyword) value="{{$keyword}}" @endisset class="form-control" placeholder="キーワードを入力してください">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
                </div>

                <div class="col-sm-8" style="text-align:right;">
                </div>
                            
                
                <div class="card">
                    <div class="card-header">課題一覧</div>
                    <table id='list-table' class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>課題</th>
                            <th>対象</th>
                            <th>質問</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->title}}</td>
                                <td>{{$task->sns_name}}</td>
                                <td>{{$task->comment}}</td>
                                <td>
                                    <div style="display:inline-flex">
                                        <a href="{{route('tasks.edit',['task'=>$task->id])}}" class="btn btn-primary btn-sm">編集</a>
                                        <form action="{{route('tasks.destroy',['task'=>$task->id])}}" method="POST">
                                            {{ csrf_field() }}
                                            @method('DELETE')
                                            <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell"
                                                onclick="return confirm('本当に削除しますか？');">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection