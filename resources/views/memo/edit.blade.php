@extends('adminlte::page')

@section('title', 'メモ編集')

@section('content_header')
<h1>メモ編集</h1>
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
            <form action="{{ route('memo.update', ['id'=> $memo->id] ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">

                    <div class="form-group">
                        <label for="type">カテゴリー</label>
                        <div class="text-red">※必須項目です。</div>
                        <select class="form-select" type="number" id="type" name="type" aria-label="Default select example">
                            <option selected>選択してください</option>
                            <option value="トップス" @if($memo->type == "トップス") selected @endif>トップス</option>
                            <option value="パンツ" @if($memo->type == "パンツ") selected @endif>パンツ</option>
                            <option value="スカート" @if($memo->type == "スカート") selected @endif>スカート</option>
                            <option value="ワンピース" @if($memo->type == "ワンピース") selected @endif>ワンピース</option>
                            <option value="小物" @if($memo->type == "小物") selected @endif>小物</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <textarea class="form-control" id="detail" name="detail">{{$memo->detail}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">アイテム画像</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="color">色</label>
                        <div class="text-red">※必須項目です。</div>
                        <input type="radio" name="color" value="白" {{ $memo->color == "白" ? 'checked' : '' }}>白　
                        <input type="radio" name="color" value="黒" {{ $memo->color == "黒" ? 'checked' : '' }}>黒　
                        <input type="radio" name="color" value="赤" {{ $memo->color == "赤" ? 'checked' : '' }}>赤　
                        <input type="radio" name="color" value="青" {{ $memo->color == "青" ? 'checked' : '' }}>青　
                        <input type="radio" name="color" value="黄" {{ $memo->color == "黄" ? 'checked' : '' }}>黄　
                        <input type="radio" name="color" value="緑" {{ $memo->color == "緑" ? 'checked' : '' }}>緑　

                    </div>
                </div>

                <div class="form-group">
                    <label for="season">着用シーズン</label>
                    <div class="text-red">※必須項目です。</div>
                    <select class="form-select d-block" type="number" id="season" name="season" aria-label="Default select example">
                        <option selected>選択してください</option>
                        <option value="春" @if($memo->type == "春") selected @endif>春</option>
                        <option value="夏" @if($memo->type == "夏") selected @endif>夏</option>
                        <option value="秋" @if($memo->type == "秋") selected @endif>秋</option>
                        <option value="冬" @if($memo->type == "冬") selected @endif>冬</option>
                        <option value="通年" @if($memo->type == "通年") selected @endif>通年</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand">ブランド</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{$memo->brand}}">
                </div>

                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$memo->price}}">
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- 削除ボタン -->
<form action="{{ route('memo.destroy', ['id'=> $memo->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="card-footer">
        <button type="submit" id="delete-memo-{{ $memo->id }}" class="btn btn-primary">削除</button>
    </div>
</form>

@stop

@section('css')
@stop

@section('js')
@stop