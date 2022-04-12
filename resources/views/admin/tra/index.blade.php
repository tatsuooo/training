@extends('layouts.admin')
@section('title', '登録済みトレーニングの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>トレーニング一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TraController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TraController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">メニュー</th>
                                <th width="15%">セット数</th>
                                <th width="15%">時間</th>
                                <th width="15%">重量</th>
                                <th width="30%">詳細説明</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $tra)
                                <tr>
                                    <th>{{ $tra->id }}</th>
                                    <td>{{ str_limit($tra->menu, 30) }}</td>
                                    <td>{{ str_limit($tra->set, 10) }}</td>
                                    <td>{{ str_limit($tra->times, 10) }}</td>
                                    <td>{{ str_limit($tra->weight, 10) }}</td>
                                    <td>{{ str_limit($tra->body, 25) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\TraController@edit', ['id' => $tra->id]) }}">編集</a>
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
@endsection
