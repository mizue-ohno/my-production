@extends('adminlte::page')

@section('title', 'アイテム一覧')

@section('content_header')
<h1>アイテム一覧</h1>
@stop

@section('content')

<!-- 検索 -->
<div>
    <form action="{{ route('item.index') }}" method="GET">
        <input type="text" name="keyword" value="{{ $keyword }}">
        <input type="submit" value="検索">
    </form>
</div>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">アイテム一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('item.create') }}" class="btn btn-default">アイテム登録</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
            <div class="row">
                @foreach ($items as $item)
                <div class="card col-sm-3 col-xs-12">
                    <img src="data:image/png;base64,{{ $item->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">アイテムカテゴリー：{{ $item->type }}</h5><br>
                        <!-- ここには表示せずに、検索はできるようにしたい。 -->
                        <h7>{{ $item->color }}</h7><br>
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
    @stop

    @section('js')
    @stop