<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// アイテム一覧表示
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



// メモ一覧表示
Route::get('/memos', [ItemController::class, 'index'])->name('memo.index');
// メモ登録画面表示
Route::get('/memos/create', [ItemController::class, 'create'])->name('memo.create');
// メモ登録処理
Route::post('/memos', [ItemController::class, 'store'])->name('memo.store');
// メモ編集画面表示
Route::get('/memos/{id}/edit', [ItemController::class, 'edit'])->name('memo.edit');
// メモ編集更新処理
Route::patch('/memos/{id}', [ItemController::class, 'update'])->name('memo.update');
// メモ削除処理
Route::delete('/memos/{id}', [ItemController::class, 'destroy'])->name('memo.destroy');


