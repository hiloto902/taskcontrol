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
                        //持ってくるのをcases
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->title}}</td>
                                
                                <td>{{$task->comment}}</td>
                                <td>
                                    <div style="display:inline-flex">
                                        <a href="{{route('tasks.show', ['task'=>$task->id])}}" class="btn btn-primary btn-sm">詳細</a>
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
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">

            <!-- メニュー項目 -->
            <li id="company"><a href="/admin/member/new">発注会社マスタ</a></li>
            <li id="user"><a href="/admin/member/edit">新規アカウント追加</a></li>
            <li id="case"><a href="/admin/member/add">新規案件追加</a></li>

            </ul>
        </section>
    </aside>
</div>
@endsection
