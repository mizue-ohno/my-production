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
        }

        // メモリストをMemoテーブルから取得
        $memos = $query->latest()->get();

        // アイテムリストを表示する
        return view('memo.index', compact('memos', 'keyword'));
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
        $request->validate(
            [
                'type' => 'required|max:16',
                'detail' => 'max:500',
                'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
                'color' => 'required',
                'season' => 'required|max:16',
                'brand' => 'max:16',
                'price' => 'nullable|integer|min:0',

            ],
            [
                'type.required' => 'カテゴリーを選択してください。',
                'detail.max' => '詳細は500文字以内で入力してください。',
                'image.max' => '画像ファイルは45KB以下にしてください。',
                'image.mines' => 'このファイル形式では登録できません。',
                'color.required' => 'カラーを選択してください。',
                'season.required' => '着用シーズンを選択してください。',
                'brand.max' => 'ブランド名は16文字以内で入力してください。',
                'price.integer' => '価格は整数で入力してください。',
                'price.min' => '価格は0以上の整数で入力してください。',

            ]
        );

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

        ],
        [
            'type.required' => 'カテゴリーを選択してください。',
            'detail.max' => '詳細は500文字以内で入力してください。',
            'image.max' => '画像ファイルは45KB以下にしてください。',
            'image.mines' => 'このファイル形式では登録できません。',
            'color.required' => 'カラーを選択してください。',
            'season.required' => '着用シーズンを選択してください。',
            'brand.max' => 'ブランド名は16文字以内で入力してください。',
            'price.max' => '価格は16文字以内で入力してください。',
            'group.max' => 'グループは16文字以内で入力してください。'

        ]
);

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
