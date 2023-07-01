<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    /**
     * アイテム一覧
     */
    public function index()
    {
        // メモ一覧をMemoテーブルから取得
        $memos =Memo ::latest()->get();

        // アイテム一覧を表示する
        return view('memo.index', compact('memos'));
    }

    /**
     * メモの新規登録
     */

    //  メモ登録画面を表示
    public function create()
    {
        return view('memo.create');
    }

    // アイテム登録処理
    public function store(Request $request)
    {
        // バリデーション
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
            Memo::create([
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
            return redirect()->route('memo.index');
    }

      /**
     * メモ編集
     */

    // メモ編集画面を表示
    public function edit(Request $request, $id){
        $item = Memo::find($id);
        
        return view('memo.edit', compact('memo'));
    }

    // アイテム編集処理
    public function update(Request $request){

        // バリデーション
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

        $memo = Memo::find($request->id);
        $image = $memo->image;

        if ($request->file('image')) {

            $image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }

        // Itemテーブルを更新し、アイテムを更新登録
        $memo->update([
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
        return redirect()->route('memo.index');

    }

    // アイテムを削除する
    public function destroy($id){
        Memo::find($id)->delete($id);
        return redirect()->route('memo.index');
    

    
    }


}

