@extends('adminlte::page')

@section('title', 'MY PAGE')

@section('content_header')
    <h1>MY PAGE</h1>
@stop

@section('content')

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
                <form action="{{ route('user.my_update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="変更する場合は入力してください">
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </form>
            </div>

@stop

@section('css')
@stop

@section('js')
@stop