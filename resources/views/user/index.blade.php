@extends('adminlte::page')

@section('title', 'ユーザー一覧')

@section('content_header')
    <h1>ユーザー一覧</h1>
@stop

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">名前</th>
      <th scope="col">メールアドレス</th>
      <th scope="col">管理者</th>
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