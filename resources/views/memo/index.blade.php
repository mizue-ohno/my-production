@extends('adminlte::page')

@section('title', 'ほしいもの一覧')

@section('content_header')
<h1>ほしいもの一覧</h1>
@stop

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ほしいもの一覧</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <div class="input-group-append">
                            <a href="{{ route('memo.create') }}" class="btn btn-default">ほしいもの登録</a>
                        </div>
                    </div>
                </div>
            </div>





@stop

@section('css')
@stop

@section('js')
@stop