@extends('adminlte::page')

@section('title', '新規アイテム登録')

@section('content_header')
<h1>新規アイテム登録</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card-tools">
            <div class="input-group input-group-sm">
                <div class="input-group-append">
                    <a href="{{ route('item.index') }}" class="btn btn-default">アイテムリストに戻る</a>
                </div>
            </div>
        </div>

        <div class="card card-primary">
            <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="type">カテゴリー</label>
                        <div class="text-red">※必須項目です。</div>
                        <select class="form-select" type="number" id="type" name="type" aria-label="Default select example">
                            <option selected value="" disabled>選択してください</option>
                            <option value="トップス" {{ old('type') == "トップス" ? 'selected' : ''}}>トップス</option>
                            <option value="パンツ" {{ old('type') == "パンツ" ? 'selected' : ''}}>パンツ</option>
                            <option value="スカート" {{ old('type') == "スカート" ? 'selected' : ''}}>スカート</option>
                            <option value="ワンピース" {{ old('type') == "ワンピース" ? 'selected' : ''}}>ワンピース</option>
                            <option value="小物" {{ old('type') == "小物" ? 'selected' : ''}}>小物</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea class="form-control" id="detail" name="detail" placeholder="アイテム説明">{{ old('detail') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="brand">アイテム画像</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="buy_date">購入日</label>
                        <div class="text-red">※必須項目です。</div>
                        <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{ old('buy_date') }}">
                    </div>

                    <div class="form-group">
                        <label for="color">カラー</label><br>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="color" value="白" {{ old('color') == '白' ? 'checked' : '' }}>白　
                        <input type="radio" name="color" value="黒" {{ old('color') == '黒' ? 'checked' : '' }}>黒　
                        <input type="radio" name="color" value="赤" {{ old('color') == '赤' ? 'checked' : '' }}>赤　
                        <input type="radio" name="color" value="青" {{ old('color') == '青' ? 'checked' : '' }}>青　
                        <input type="radio" name="color" value="黄" {{ old('color') == '黄' ? 'checked' : '' }}>黄　
                        <input type="radio" name="color" value="緑" {{ old('color') == '緑' ? 'checked' : '' }}>緑
                    </div>

                    <div class="form-group">
                        <label for="season">着用シーズン</label><br>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="season" value="春" {{ old('season') == '春' ? 'checked' : '' }}>春　
                        <input type="radio" name="season" value="夏" {{ old('season') == '夏' ? 'checked' : '' }}>夏　
                        <input type="radio" name="season" value="秋" {{ old('season') == '秋' ? 'checked' : '' }}>秋　
                        <input type="radio" name="season" value="冬" {{ old('season') == '冬' ? 'checked' : '' }}>冬　
                        <input type="radio" name="season" value="通年" {{ old('season') == '通年' ? 'checked' : '' }}>通年　
                    </div>


                    <div class="form-group">
                        <label for="brand">ブランド</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="ブランド" value="{{ old('brand') }}">
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
@stop