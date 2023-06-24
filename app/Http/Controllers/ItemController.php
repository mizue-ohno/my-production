<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * アイテム一覧
     */
    public function index()
    {
        // アイテム一覧をItemテーブルから取得
        $items = Item::latest()->get();

        // アイテム一覧を表示する
        return view('item.index', compact('items'));
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
        $request->validate([
                'name' => 'max:100',
                'type' => 'required|max:16',
                'detail' => 'max:500',
                'image' =>'file | max:45 | mimes:jpeg,png,jpg,pdf',
                'buy_date' => 'required',
                'color' => 'required',
                'season' => 'max:16',
                'brand' => 'max:16',
                'group' => 'max:16',

            ]);

        $image = null;
        if ($request->file('image')) {
            $image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }
    
            // Itemテーブルを更新アイテム登録
            Item::store([
                'user_id' => Auth::user()->id,
                'name' => $request ->name,
                'type' => $request ->type,
                'detail' => $request ->detail,
                'image' => $image,
                'buy_date' => $request ->buy_date,
                'color' => $request ->color,
                'season' => $request ->season,
                'brand' => $request ->brand,
                'group' => $request ->group,
            ]);
            
            // アイテム一覧に戻る
            return redirect()->route('item.index');
    }


}
