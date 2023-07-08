@extends('adminlte::page')

@section('title', 'ユーザーリスト')

@section('content_header')
<h1>ユーザーリスト</h1>
@stop

@section('content')
<!-- 検索 -->
<div>
  <form action="{{ route('user.index') }}" method="GET">
    <lavel for="">キーワード
      <div>
        <input type="text" name="keyword" value="{{ $keyword }}">
      </div>
      <div>
        <input type="radio" name="is_admin" value="0">一般　
        <input type="radio" name="is_admin" value="1">管理者　
        <button type="button" onclick="radioDeselection()">選択解除</button>
      </div>
    </lavel>

    <input type="submit" value="検索">
  </form>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">名前</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">権限</th>
      <th scope="col">登録日時</th>
      <th scope="col">編集日時</th>

    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->is_admin == 0 ? '一般' : '管理者' }}</td>
      <td>{{ $user->created_at }}</td>
      <td>{{ $user->updated_at }}</td>
      <td><a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-info">編集</a></td>
    </tr>
    @endforeach
  </tbody>
</table>







@stop

@section('css')
@stop

@section('js')
@stop