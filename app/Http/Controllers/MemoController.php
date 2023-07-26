<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MemoFormRequest;

class MemoController extends Controller
{
    /**
     * メモリスト
     */
    public function index(Request $request)
    {
        // ログインしているユーザー情報を取得
        $user = Auth::user()->id;

        $keyword = $request->input('keyword');

        $query = Memo::query();

        if (!empty($keyword)) {
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('color', 'LIKE', "%{$keyword}%")
                    ->orWhere('season', 'LIKE', "%{$keyword}%")
                    ->orWhere('detail', 'LIKE', "%{$keyword}%")
                    ->orWhere('brand', 'LIKE', "%{$keyword}%")
                    ->orWhere('type', 'LIKE', "%{$keyword}%");
            });
        }

        // メモリストをMemoテーブルから取得
        $memos = $query->where('user_id', "=" , $user)->latest()->get();

        // メモリストを表示する（ログインしているユーザーが登録したもののみ）
        return view('memo.index', compact('memos', 'keyword' ,'user'));
    }


    /**
     * メモの新規登録
     */

    //  メモ登録画面を表示
    public function create()
    {
        return view('memo.create');
    }

    // メモ登録処理
    public function store(MemoFormRequest $request)
    {

        $image = null;
        if ($request->file('image')) {
            $image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }

        // Itemテーブルを更新アイテム登録
        Memo::create([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'detail' => $request->detail,
            'image' => $image,
            'buy_date' => $request->buy_date,
            'color' => $request->color,
            'season' => $request->season,
            'brand' => $request->brand,
            'price' => $request->price,
        ]);

        // メモリストに戻る
        return redirect()->route('memo.index');
    }

    /**
     * メモ編集
     */

    // メモ編集画面を表示
    public function edit(Request $request, $id)
    {
        $memo = Memo::find($id);

        return view('memo.edit', compact('memo'));
    }

    // アイテム編集処理
    public function update(MemoFormRequest $request)
    {

        $memo = Memo::find($request->id);
        $image = $memo->image;

        if ($request->file('image')) {

            $image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }

        // Memoテーブルを更新し、メモを更新登録
        $memo->update([
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'detail' => $request->detail,
            'image' => $image,
            'buy_date' => $request->buy_date,
            'color' => $request->color,
            'season' => $request->season,
            'brand' => $request->brand,
            'price' => $request->price,
        ]);

        // メモリストに戻る
        return redirect()->route('memo.index');
    }

    // メモを削除する
    public function destroy($id)
    {
        Memo::find($id)->delete($id);
        return redirect()->route('memo.index');
    }
}
