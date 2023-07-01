<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


        /**
     * ユーザー一覧
     */
    public function index()
    {
        // ユーザー一覧をUserテーブルから取得
        $users = User::latest()->get();

        // アイテム一覧を表示する
        return view('user.index', compact('users'));
    }

          /**
     * ユーザー編集
     */

    // ユーザー編集画面を表示
    public function edit(Request $request, $id){

        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    // ユーザー編集処理
    public function update(Request $request){

        // バリデーション
        $request->validate([
            'name' => 'max:100',
        ]);


        // Userテーブルを更新し、ユーザーを更新登録
        $user = User::find($request->id);
        $user->update([
            'name' => $request ->name,
            'email' => $request ->email,
            'is_admin' => $request ->is_admin,
        ]);

        //  ユーザー一覧に戻る
        return redirect()->route('user.index');

    


    }

}
