<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * アイテム一覧
     */
    public function index(Request $request)
    {

        $keyword = $request->input('keyword');
        $type = $request->input('type');
        $season = $request->input('season');
        $color = $request->input('color');

        $query = Item::query();

        if (!empty($keyword)) {
            $query->where('color', 'LIKE', "%{$keyword}%")
                ->orWhere('season', 'LIKE', "%{$keyword}%");
        }

        if (!empty($type)) {
            $query->where('type', "=", $type);
        }

        if (!empty($season)) {
            $query->where('season', "=", $season);
        }

        if (!empty($color)) {
            $query->where('color', "=", $color);
        }

        // アイテム一覧をItemテーブルから取得
        $items = $query->latest()->get();

        // アイテム一覧を表示する
        return view('item.index', compact('items', 'keyword', 'type', 'season', 'color'));
    }

    /**
     * アイテム登録
     */

    //  アイテム登録画面を表示
    public function create()
    {
        return view('item.create');
    }

    // アイテム登録処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'type' => 'required',
                'detail' => 'max:500',
                'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
                'buy_date' => 'required',
                'color' => 'required',
                'season' => 'required',
                'brand' => 'max:16',
                'group' => 'max:16',

            ],
            [
                'type.required' => 'カテゴリーを選択してください。',
                'detail.max' => '詳細は500文字以内で入力してください。',
                'image.max' => '画像ファイルは45KB以下にしてください。',
                'image.mines' => 'このファイル形式では登録できません。',
                'buy_date.required' => '日付を選択してください。',
                'color.required' => 'カラーを選択してください。',
                'brand.max' => 'ブランド名は16文字以内で入力してください。',
                'group.max' => 'グループは16文字以内で入力してください。'

            ]
        );

        $image = null;
        if ($request->file('image')) {
            $image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }

        // Itemテーブルを更新アイテム登録
        Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
            'image' => $image,
            'buy_date' => $request->buy_date,
            'color' => $request->color,
            'season' => $request->season,
            'brand' => $request->brand,
            'group' => $request->group,

        ]);

        // アイテム一覧に戻る
        return redirect()->route('item.index');
    }

    /**
     * アイテム編集
     */

    // アイテム編集画面を表示
    public function edit(Request $request, $id)
    {
        $item = Item::find($id);

        return view('item.edit', compact('item'));
    }

    // アイテム編集処理
    public function update(Request $request)
    {

        // バリデーション
        $request->validate(
            [
                'type' => 'required',
                'detail' => 'max:500',
                'image' => 'file | max:45 | mimes:jpeg,png,jpg,pdf',
                'buy_date' => 'required',
                'color' => 'required',
                'season' => 'required',
                'brand' => 'max:16',
                'group' => 'max:16',

            ],
            [
                'type.required' => 'カテゴリーを選択してください。',
                'detail.max' => '詳細は500文字以内で入力してください。',
                'image.max' => '画像ファイルは45KB以下にしてください。',
                'image.mines' => 'このファイル形式では登録できません。',
                'buy_date.required' => '日付を選択してください。',
                'color.required' => 'カラーを選択してください。',
                'brand.max' => 'ブランド名は16文字以内で入力してください。',
                'group.max' => 'グループは16文字以内で入力してください。'

            ]
        );

        $item = Item::find($request->id);
        $image = $item->image;

        if ($request->file('image')) {

            $image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }

        // Itemテーブルを更新し、アイテムを更新登録
        $item->update([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'type' => $request->type,
            'detail' => $request->detail,
            'image' => $image,
            'buy_date' => $request->buy_date,
            'color' => $request->color,
            'season' => $request->season,
            'brand' => $request->brand,
            'group' => $request->group,
        ]);

        // アイテム一覧に戻る
        return redirect()->route('item.index');
    }

    // アイテムを削除する
    public function destroy($id)
    {
        Item::find($id)->delete($id);
        return redirect()->route('item.index');
    }
}
