<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * メモリスト
     */
    public function index(Request $request)
    {
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

            // メモリストをMemoテーブルから取得
            $memos = $query->latest()->get();

            // アイテムリストを表示する
            return view('memo.index', compact('memos', 'keyword'));
        }
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
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'type' => 'required|max:16',
            'detail' => 'max:500',
            'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
            'color' => 'required',
            'season' => 'max:16',
            'brand' => 'max:16',
            'price' => 'max:16',

        ]);

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
        $item = Memo::find($id);

        return view('memo.edit', compact('memo'));
    }

    // アイテム編集処理
    public function update(Request $request)
    {

        // バリデーション
        $request->validate([
            'type' => 'required|max:16',
            'detail' => 'max:500',
            'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
            'color' => 'required',
            'season' => 'max:16',
            'brand' => 'max:16',
            'price' => 'max:16',

        ]);

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
