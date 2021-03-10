@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">案件一覧</div>
                    <table id='list-table' class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>課題</th>
                            
                            <th>質問</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($matters as $matter)
                            <tr>
                                <td>{{$matter->title}}</td>
                                
                                <td>{{$matter->comment}}</td>
                                <td>
                                    <div style="display:inline-flex">
                                        <a href="{{route('matters.show', ['matter'=>$matter->id])}}" class="btn btn-primary btn-sm">詳細</a>
                                        <a href="{{route('matters.edit',['matter'=>$matter->id])}}" class="btn btn-primary btn-sm">編集</a>
                                        <form action="{{route('matters.destroy',['matter'=>$matter->id])}}" method="POST">
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
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('about') }}">{{ __('使い方') }}</a>
    </li> 
    </ul>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">

            <!-- メニュー項目 -->
            <li id="company"><a href="top/add_companies">{{ __('会社発注マスタ') }}</a></li>
            <li id="user"><a href="top/add_users">{{ __('新規アカウント追加') }}</a></li>
            <li id="matter"><a href="top/add_matters">{{ __('新規案件追加') }}</a></li>

            </ul>
        </section>
    </aside>
</div>
@endsection
