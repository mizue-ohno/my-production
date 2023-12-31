<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemFormRequest;

class ItemAdminController extends Controller
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
                $query->where(function($query) use ($keyword) {
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
    
            // アイテムリストをItemテーブルから取得（すべて）
            $items = $query->latest()->get();
    
            // アイテムリストを表示する
            return view('item.index_ad', compact('items', 'keyword', 'type', 'season', 'color' ));
        }
    
        /**
         * アイテム登録
         */
    
        //  アイテム登録画面を表示
        public function create()
        {
            return view('item.create_ad');
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
            return redirect()->route('item_ad.index');
        }
    
        /**
         * アイテム編集
         */
    
        // アイテム編集画面を表示
        public function edit(Request $request, $id)
        {
            $item = Item::find($id);
    
            return view('item.edit_ad', compact('item'));
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
            return redirect()->route('item_ad.index');
        }
    
        // アイテムを削除する
        public function destroy($id)
        {
            Item::find($id)->delete($id);
            return redirect()->route('item_ad.index');
        }
    }
    