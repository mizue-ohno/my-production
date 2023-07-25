@extends('adminlte::page')

@section('title', '管理者：ほしいものリスト')

@section('content_header')
<h1>管理者ページ：ほしいものリスト</h1>
@stop

@section('content')

<!-- 検索 -->
<div class="memo_search">
    <form action="{{ route('memo_ad.index') }}" method="GET">
        <label for="">キーワード
            <div>
                <input type="text" name="keyword" value="{{ $keyword }}">
            </div>
            </lavel>
            <input type="submit" value="検索">
    </form>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ほしいものリスト</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('memo_ad.create') }}" class="btn btn-default">新規ほしいもの登録</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($memos as $memo)
                    <div class="card col-sm-3 col-xs-12">

                        @if ($memo->image)
                        <img src="data:image/png;base64,{{ $memo->image }}" class="card-img-top" alt="...">
                        @else
                        <img src="{{asset('/image/noimage.png')}}" class="card-img-top" alt="...">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">カテゴリー：{{ $memo->type }}</h5><br>
                            <h7>着用シーズン：{{ $memo->season }}</h7><br>
                            <h7>価格：{{ number_format($memo->price) }}</h7><br>
                            <p class="card-text">{{ $memo->detail }}</p><br>
                            <a href="{{ route('memo_ad.edit', ['id' => $memo->id]) }}" class="btn btn-primary">編集</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    @stop

    @section('css')
    @stop

    @section('js')
    @stop