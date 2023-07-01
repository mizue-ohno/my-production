@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
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
                            <a href="{{ route('user.index') }}" class="btn btn-default">ユーザー一覧に戻る</a>                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="card card-primary">
                <form action="{{ route('user.update', ['id'=> $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="season">メールアドレス</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="is_admin">管理者</label>
                            <input type="hidden" name="is_admin" value="0">

                            <input type="checkbox" {{ $user->is_admin == 1 ? 'checked' : '' }} name="is_admin" value="1" class="d-block">
                        </div>
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- 削除ボタン -->
                <form action="{{ route('user.destroy', ['id'=> $user->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                <div class="card-footer">
                    <button type="submit" id="delete-user-{{ $user->id }}" class="btn btn-primary">削除</button>
                </div>
                </form>


@stop

@section('css')
@stop

@section('js')
@stop