<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加

class CyclingController extends Controller
{
    public function index(Profile $profile)
    {
    return $profile->get();
    }
    
    //ユーザプロフィール表示
    public function user()
    {
    return view('user', ['user' => Auth::user() ]);
    }

    //ユーザ編集
    public function edit()
    {
    return view('edit', ['user' => Auth::user() ]);
    }

    //userデータの保存
    public function update(Request $request) 
    {
        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        //リダイレクト
        return redirect('user');
    }

}
