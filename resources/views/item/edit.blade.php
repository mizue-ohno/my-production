@extends('adminlte::page')

@section('title', 'アイテム更新')

@section('content_header')
<h1>アイテム更新</h1>
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
        <div class="card-header">
            <div class="card-tools">
                <div class="input-group input-group-sm">
                    <div class="input-group-append">
                        <a href="{{ route('item.index') }}" class="btn btn-default">アイテム一覧に戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card card-primary">
        <form action="{{ route('item.update', ['id'=> $item->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">

                <div class="form-group">
                    <label for="type">カテゴリー</label>
                    <select class="form-select d-block" type="number" id="type" name="type" aria-label="Default select example">
                        <option selected>選択してください</option>
                        <option value="トップス" @if($item->type == "トップス") selected @endif>トップス</option>
                        <option value="パンツ" @if($item->type == "パンツ") selected @endif>パンツ</option>
                        <option value="スカート" @if($item->type == "スカート") selected @endif>スカート</option>
                        <option value="ワンピース" @if($item->type == "ワンピース") selected @endif>ワンピース</option>
                        <option value="小物" @if($item->type == "小物") selected @endif>小物</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="detail">詳細</label>
                    <textarea class="form-control" id="detail" name="detail">{{$item->detail}}</textarea>
                </div>

                <div class="form-group">
                    <label for="brand">アイテム画像</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="buy_date">購入日</label>
                    <input type="date" class="form-control" id="buy_date" name="buy_date" value="{{$item->buy_date}}">
                </div>

                <div class="form-group">
                    <label for="color">カラー</label><br>
                    <input type="radio" name="color" value="白">白　
                    <input type="radio" name="color" value="黒">黒　
                    <input type="radio" name="color" value="赤">赤
                </div>


                <div class="form-group">
                    <label for="type">着用シーズン</label>
                    <select class="form-select d-block" type="number" id="season" name="season" aria-label="Default select example">
                        <option selected>選択してください</option>
                        <option value="春" @if($item->type == "春") selected @endif>春</option>
                        <option value="夏" @if($item->type == "夏") selected @endif>夏</option>
                        <option value="秋" @if($item->type == "秋") selected @endif>秋</option>
                        <option value="冬" @if($item->type == "冬") selected @endif>冬</option>
                        <option value="通年" @if($item->type == "通年") selected @endif>通年</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="color">カラー</label><br>
                    <input type="radio" name="color" value="白">白　
                    <input type="radio" name="color" value="黒">黒　
                    <input type="radio" name="color" value="赤">赤
                </div>

                <div class="form-group">
                    <label for="type">着用シーズン</label><br>
                    <input type="radio" name="season" value="春" @if($item->type == "春") selected @endif>春　
                    <input type="radio" name="season" value="夏" @if($item->type == "夏") selected @endif>夏　
                    <input type="radio" name="season" value="秋" @if($item->type == "秋") selected @endif>秋　
                    <input type="radio" name="season" value="冬" @if($item->type == "冬") selected @endif>冬　
                    <input type="radio" name="season" value="通年">通年　
                </div>


                <div class="form-group">
                    <label for="brand">ブランド</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{$item->brand}}">
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">更新</button>
                </div>
        </form>
    </div>
</div>
</div>

<!-- 削除ボタン -->
<form action="{{ route('item.destroy', ['id'=> $item->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <div class="card-footer">
        <button type="submit" id="delete-item-{{ $item->id }}" class="btn btn-primary">削除</button>
    </div>
</form>


@stop

@section('css')
@stop

@section('js')
@stop