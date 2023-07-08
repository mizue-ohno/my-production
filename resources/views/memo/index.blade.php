@extends('adminlte::page')

@section('title', 'ほしいもの一覧')

@section('content_header')
<h1>ほしいもの一覧</h1>
@stop

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ほしいもの一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('memo.create') }}" class="btn btn-default">ほしいもの登録</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($memos as $memo)
                    <div class="card col-sm-3 col-xs-12">
                        <img src="data:image/png;base64,{{ $memo->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">アイテムカテゴリー：{{ $memo->type }}</h5><br>
                            <!-- ここには表示せずに、検索はできるようにしたい。 -->
                            <h7>{{ $memo->color }}</h7><br>
                            <h7>着用シーズン：{{ $memo->season }}</h7><br>
                            <h7>価格：{{ $memo->price }}</h7><br>
                            <p class="card-text">{{ $memo->detail }}</p><br>
                            <a href="{{ route('memo.edit', ['id' => $memo->id]) }}" class="btn btn-primary">編集</a>
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