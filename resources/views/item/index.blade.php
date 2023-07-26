@extends('adminlte::page')

@section('title', 'アイテムリスト')

@section('content_header')
<h1>アイテムリスト</h1>
@stop


@section('content')

<!-- 検索 -->
<div class="item_search">
    <form action="{{ route('item.index') }}" method="GET">
        <label for="">キーワード
            <div>
                <input type="text" name="keyword" value="{{ $keyword }}">
            </div>
        </lavel>
        <label for="">カテゴリー
            <div>
                <select class="form-select" name="type" aria-label="Default select example">
                    <option value="">すべて</option>
                    <option value="トップス">トップス</option>
                    <option value="パンツ">パンツ</option>
                    <option value="スカート">スカート</option>
                    <option value="ワンピース">ワンピース</option>
                    <option value="小物">小物</option>
                </select>
            </div>
        </label>
        <br>
        <label for="">着用シーズン
            <div>
                <select class="form-select" name="season" aria-label="Default select example">
                    <option value="">すべて</option>
                    <option value="春">春</option>
                    <option value="夏">夏</option>
                    <option value="秋">秋</option>
                    <option value="冬">冬</option>
                    <option value="通年">通年</option>
                </select>
            </div>
        </label>
        <br>
        <label for="">カラー
            <div>
                <select class="form-select" name="color" aria-label="Default select example">
                    <option value="">すべて</option>
                    <option value="白">白</option>
                    <option value="黒">黒</option>
                    <option value="赤">赤</option>
                    <option value="青">青</option>
                    <option value="黄">黄</option>
                    <option value="緑">緑</option>
                </select>
            </div>
        </label>
        <br>


        <input type="submit" value="検索">
    </form>
</div>

<div class="count">{{ $items->count() }} 件ヒットしました！</div>

<div class="search">
    <div>キーワード：{{ request()->input('keyword') }}</div>
    <div>カテゴリー：{{ request()->input('type') }} </div>
    <div>着用シーズン：{{ request()->input('season') }} </div>
    <div>カラー：{{ request()->input('color') }} </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">アイテムリスト</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('item.create') }}" class="btn btn-default">新規アイテム登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($items as $item)
                    <div class="card col-sm-3 col-xs-12">
                    @if ($item->image)

                        <img src="data:image/png;base64,{{ $item->image }}" class="card-img-top" alt="...">
                        @else
                        <img src="{{asset('/image/noimage.png')}}" class="card-img-top"alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">カテゴリー：{{ $item->type }}</h5><br>
                            <h7>着用シーズン：{{ $item->season }}</h7><br>
                            <h7>購入日：{{ $item->buy_date }}</h7><br>
                            <p class="card-text">{{ $item->detail }}</p><br>
                            <a href="{{ route('item.edit', ['id' => $item->id]) }}" class="btn btn-primary">編集</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('css')
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stop
    
    @section('js')
    @stop