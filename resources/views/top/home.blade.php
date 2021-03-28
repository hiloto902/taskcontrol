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
                            <th>案件</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($matters as $matter)
                            <tr>
                                <td>{{$matter->title}}</td>
                                
                                
                                <td>
                                    <div style="display:inline-flex">
                                        
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
            <li id="company"><a href="top/add_companies">{{ __('会社発注マスタ') }}</a></li>
            <li id="user"><a href="top/add_users">{{ __('新規アカウント追加') }}</a></li>
            <li id="matter"><a href="top/add_matters">{{ __('新規案件追加') }}</a></li>

            </ul>
        </section>
    </aside>
</div>
@endsection
