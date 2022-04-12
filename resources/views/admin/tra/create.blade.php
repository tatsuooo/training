@extends('layouts.admin')
@section('title', 'トレーニングメニュー作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>トレーニングメニュー</h2>
                <form action="{{ action('Admin\TraController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="menu">メニュー</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="menu" value="{{ old('menu') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="set">セット数</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="set" rows="1">{{ old('set') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="times">時間</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="times" rows="1">{{ old('times') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="weight">重量</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="weight" rows="1">{{ old('weight') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                         <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                        <a href="http://localhost:8000/admin/tra"><button type="button" class="btn btn-success">ホーム画面に戻る</button></a>
                </form>
            </div>
        </div>
    </div>
@endsection
