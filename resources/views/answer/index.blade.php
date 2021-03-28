@extends('layouts.app')

@section('content')
<div class="container">
        

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">返信</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 @auth
                    <form method="POST" action="{{ route('answer.store') }}">
                        @csrf
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('返信') }}</label>

                                <div class="col-md-6">
                                    <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="answer" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        
                        <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('task_id') }}</label>

                                <div class="col-md-6">
                                    <input id="task_id" type="text" class="form-control @error('task_id') is-invalid @enderror" name="task_id" value="{{ old('task_id') }}" required autocomplete="task_id" autofocus>

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
                
               
                            
                
                <div class="card">
                    <div class="card-header">返信一覧</div>
                    <table id='list-table' class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>返信</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($answers as $answer)
                            <tr>
                                <td>{{$answer->answer}}</td>
                                <td>
                                    <div style="display:inline-flex">
                                        <a href="{{route('answer.edit',['answer'=>$answer->id])}}" class="btn btn-primary btn-sm">編集</a>
                                        <form action="{{route('answer.destroy',['answer'=>$answer->id])}}" method="POST">
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