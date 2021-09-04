{{-- layouts/addmin1.blade.phpを読み込む --}}
@extends('layouts.admin1')


{{-- admin1.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'カレンダー画面')

{{-- admin1.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')


        <div class="col-md-8 mx-auto">
                <h4 align="center">カレンダー画面</h4>
</div>

@endsection
