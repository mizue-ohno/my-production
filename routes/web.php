<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\ItemAdminController;
use App\Http\Controllers\MemoAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::middleware('auth')->group(function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware('admin')->group(function () {
        // ユーザーリスト表示
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        // ユーザー編集画面表示
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        // ユーザー編集更新処理
        Route::patch('/users/{id}', [UserController::class, 'update'])->name('user.update');
        // ユーザー削除処理
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        // 管理者はすべてのアイテムリストを観覧できる
        // アイテムリスト表示
        Route::get('/items/admin', [ItemAdminController::class, 'index'])->name('item_ad.index');
        // アイテム登録画面表示
        Route::get('/items/create/admin', [ItemAdminController::class, 'create'])->name('item_ad.create');
        // アイテム登録処理
        Route::post('/items/admin', [ItemAdminController::class, 'store'])->name('item_ad.store');
        // アイテム編集画面表示
        Route::get('/items/{id}/edit/admin', [ItemAdminController::class, 'edit'])->name('item_ad.edit');
        // アイテム編集更新処理
        Route::patch('/items/{id}/admin', [ItemAdminController::class, 'update'])->name('item_ad.update');
        // アイテム削除処理
        Route::delete('/items/{id}/admin', [ItemAdminController::class, 'destroy'])->name('item_ad.destroy');

        // 管理者はすべてのメモリストを観覧できる
        // メモリスト表示
        Route::get('/memos/admin', [MemoAdminController::class, 'index'])->name('memo_ad.index');
        // メモ登録画面表示
        Route::get('/memos/create/admin', [MemoAdminController::class, 'create'])->name('memo_ad.create');
        // メモ登録処理
        Route::post('/memos/admin', [MemoAdminController::class, 'store'])->name('memo_ad.store');
        // メモ編集画面表示
        Route::get('/memos/{id}/edit/admin', [MemoAdminController::class, 'edit'])->name('memo_ad.edit');
        // メモ編集更新処理
        Route::patch('/memos/{id}/admin', [MemoAdminController::class, 'update'])->name('memo_ad.update');
        // メモ削除処理
        Route::delete('/memos/{id}/admin', [MemoAdminController::class, 'destroy'])->name('memo_ad.destroy');
    });

    // マイページ
    Route::get('/mypage', [UserController::class, 'mypage'])->name('user.mypage');
    Route::patch('/mypage', [UserController::class, 'my_update'])->name('user.my_update');




    // ユーザーごとの表示にする
    // アイテムリスト表示
    Route::get('/items', [ItemController::class, 'index'])->name('item.index');
    // アイテム登録画面表示
    Route::get('/items/create', [ItemController::class, 'create'])->name('item.create');
    // アイテム登録処理
    Route::post('/items', [ItemController::class, 'store'])->name('item.store');
    // アイテム編集画面表示
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    // アイテム編集更新処理
    Route::patch('/items/{id}', [ItemController::class, 'update'])->name('item.update');
    // アイテム削除処理
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('item.destroy');


    // ユーザーごとの表示にする
    // メモリスト表示
    Route::get('/memos', [MemoController::class, 'index'])->name('memo.index');
    // メモ登録画面表示
    Route::get('/memos/create', [MemoController::class, 'create'])->name('memo.create');
    // メモ登録処理
    Route::post('/memos', [MemoController::class, 'store'])->name('memo.store');
    // メモ編集画面表示
    Route::get('/memos/{id}/edit', [MemoController::class, 'edit'])->name('memo.edit');
    // メモ編集更新処理
    Route::patch('/memos/{id}', [MemoController::class, 'update'])->name('memo.update');
    // メモ削除処理
    Route::delete('/memos/{id}', [MemoController::class, 'destroy'])->name('memo.destroy');
});
