<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * ユーザーリスト
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $is_admin = $request->input('is_admin');
        $query = User::query();

        if (!empty($keyword)) {
            $query->orWhere('name', 'LIKE', "%{$keyword}%")
                ->orWhere('email', 'LIKE', "%{$keyword}%");
        };

        if (isset($is_admin)) {
            $query->where('is_admin', '=', $is_admin);
        };


        $users = $query->latest()->get();

        // ユーザーリストを表示する
        return view('user.index', compact('users', 'keyword'));
    }

    /**
     * ユーザー編集
     */

    // ユーザー編集画面を表示
    public function edit(Request $request, $id)
    {

        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    // ユーザー編集処理
    public function update(UserFormRequest $request)
    {
        // Userテーブルを更新し、ユーザーを更新登録
        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ]);

        //  ユーザーリストに戻る
        return redirect()->route('user.index');
    }

    // ユーザーを削除する
    public function destroy($id)
    {
        User::find($id)->delete($id);
        return redirect()->route('user.index');
    }

    // マイページを表示する
    public function mypage()
    {
        $user = Auth::user('id');
        return view('user.mypage', compact('user'));
    }

    // マイページの編集内容を更新する
    public function my_update(UserFormRequest $request)
    {

        $user = Auth::user();
        // Auth::user()の場合はupdate関数使えないので、
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }


        $user->save();
        return back();
    }
}
