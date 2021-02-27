@extends('layouts.app')

@section('content')
<div class="container">
    
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu">

            <!-- メニュー項目 -->
            <li id="company"><a href="top.add_companies">発注会社マスタ</a></li>
            <li id="user"><a href="top.add_users">新規アカウント追加</a></li>
            <li id="matter"><a href="top/add_matters">新規案件追加</a></li>

            </ul>
        </section>
    </aside>
</div>
@endsection
