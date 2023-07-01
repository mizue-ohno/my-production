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
                <form action="{{ route('memo.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="type">種別</label>
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
                            <label for="brand">アイテム画像</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="form-group">
                            <label for="color">色</label>
                            <input type="text" class="form-control" id="color" name="color" value="{{$memo->color}}">
                        </div>
                        </div>

                        <div class="form-group">
                            <label for="season">季節</label>
                            <input type="text" class="form-control" id="season" name="season" value="{{$memo->season}}">
                        </div>

                        <div class="form-group">
                            <label for="brand">ブランド</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{$memo->brand}}">
                        </div>

                        <div class="form-group">
                            <label for="brand">価格</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$memo->price}}">
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
