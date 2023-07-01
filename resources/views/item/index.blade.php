@extends('adminlte::page')

@section('title', 'アイテム一覧')

@section('content_header')
<h1>アイテム一覧</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">アイテム一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('item.create') }}" class="btn btn-default">商品登録</a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($items as $item)
            <div class="card" style="width: 18rem;">

                <img src="data:image/png;base64,{{ $item->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">アイテムタイプ：{{ $item->type }}</h5><br>
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
    @stop

    @section('css')
    @stop

    @section('js')
    @stop