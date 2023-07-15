@extends('adminlte::page')

@section('title', 'ほしいもの登録')

@section('content_header')
<h1>ほしいもの登録</h1>
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

        <div class="card card-primary">
            <form action="{{ route('memo.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="form-group">
                        <label for="type">カテゴリー</label>
                        <div class="text-red">※必須項目です。</div>
                        <select class="form-select" type="number" id="type" name="type" aria-label="Default select example">
                            <option selected>選択してください</option>
                            <option value="トップス" @if( old('type')) == "トップス") selected  @endif>トップス</option>
                            <option value="パンツ" @if( old('type')) == "パンツ") selected  @endif>パンツ</option>
                            <option value="スカート" @if( old('type')) == "スカート") selected  @endif>スカート</option>
                            <option value="ワンピース" @if( old('type')) == "ワンピース") selected  @endif>ワンピース</option>
                            <option value="小物" @if( old('type')) == "小物") selected  @endif>小物</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea class="form-control" id="detail" name="detail" placeholder="迷ったポイント、着たいシチュエーションetc.">{{ old('detail') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">画像</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="color">カラー</label><br>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="color" value="白" {{ old('color','白') == '白' ? 'checked' : '' }}>白　
                        <input type="radio" name="color" value="黒" {{ old('color','黒') == '黒' ? 'checked' : '' }}>黒　
                        <input type="radio" name="color" value="赤" {{ old('color','赤') == '赤' ? 'checked' : '' }}>赤　
                        <input type="radio" name="color" value="青" {{ old('color','青') == '青' ? 'checked' : '' }}>青　
                        <input type="radio" name="color" value="黄" {{ old('color','黄') == '黄' ? 'checked' : '' }}>黄　
                        <input type="radio" name="color" value="緑" {{ old('color','緑') == '緑' ? 'checked' : '' }}>緑
                    </div>


                    <div class="form-group">
                        <label for="season">着用シーズン</label><br>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="season" value="春" {{ old('color','春') == '春' ? 'checked' : '' }}>春　
                        <input type="radio" name="season" value="夏" {{ old('color','夏') == '夏' ? 'checked' : '' }}>夏　
                        <input type="radio" name="season" value="秋" {{ old('color','秋') == '秋' ? 'checked' : '' }}>秋　
                        <input type="radio" name="season" value="冬" {{ old('color','冬') == '冬' ? 'checked' : '' }}>冬　
                        <input type="radio" name="season" value="通年" {{ old('color','通年') == '通年' ? 'checked' : '' }}>通年　
                    </div>

                    <div class="form-group">
                        <label for="brand">ブランド</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="ブランド、売っていた場所、webサイトetc." value="{{ old('brand') }}">
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="半角数字で入力してください" value="{{ old('price') }}">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>

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