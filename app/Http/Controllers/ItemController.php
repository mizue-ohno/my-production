<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * アイテムリスト
     */
    public function index(Request $request)
    {

        $keyword = $request->input('keyword');
        $type = $request->input('type');
        $season = $request->input('season');
        $color = $request->input('color');

        $query = Item::query();

        if (!empty($keyword)) {
            $query->where(function ($query) use ($keyword) {
                $query->orWhere('color', 'LIKE', "%{$keyword}%")
                    ->orWhere('season', 'LIKE', "%{$keyword}%")
                    ->orWhere('type', 'LIKE', "%{$keyword}%")
                    ->orWhere('detail', 'LIKE', "%{$keyword}%");
            });
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

        // ログインユーザーの情報を取得
        $user = Auth::user()->id;

        // アイテムリストをItemテーブルから取得（ログインユーザーが登録したアイテムのみ表示）
        // $auth = auth()->user()->id;
        $items = $query->where('user_id', "=", $user)->latest()->get();

        // アイテムリストを表示する
        return view('item.index', compact('items', 'keyword', 'type', 'season', 'color', 'user', 'auth'));
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
    public function store(ItemFormRequest $request)
    {

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

        // アイテムリストに戻る
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
    public function update(ItemFormRequest $request)
    {

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

        // アイテムリストに戻る
        return redirect()->route('item.index');
    }

    // アイテムを削除する
    public function destroy($id)
    {
        Item::find($id)->delete($id);
        return redirect()->route('item.index');
    }
}
