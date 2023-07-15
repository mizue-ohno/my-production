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
                            <option value="トップス">トップス</option>
                            <option value="パンツ">パンツ</option>
                            <option value="スカート">スカート</option>
                            <option value="ワンピース">ワンピース</option>
                            <option value="小物">小物</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea class="form-control" id="detail" name="detail" placeholder="迷ったポイント、着たいシチュエーションetc."></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">画像</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="color">カラー</label><br>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="color" value="白">白　
                        <input type="radio" name="color" value="黒">黒　
                        <input type="radio" name="color" value="赤">赤　
                        <input type="radio" name="color" value="青">青　
                        <input type="radio" name="color" value="黄">黄　
                        <input type="radio" name="color" value="緑">緑　
                    </div>


                    <div class="form-group">
                        <label for="season">着用シーズン</label><br>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="season" value="春">春　
                        <input type="radio" name="season" value="夏">夏　
                        <input type="radio" name="season" value="秋">秋　
                        <input type="radio" name="season" value="冬">冬　
                        <input type="radio" name="season" value="通年">通年　
                    </div>

                    <div class="form-group">
                        <label for="brand">ブランド</label>
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="ブランド、売っていた場所、webサイトetc.">
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="半角数字で入力してください">
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