<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Sex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加
use Storage;

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
    public function edit(Sex $sex)
    {
    return view('edit', ['user' => Auth::user() ])->with(['sexes' => $sex->get()]);
    }

    //userデータの保存
    public function update(Request $request) 
    {
    $user = Auth::user();
    //不要な「_token」の削除
    unset($request['_token']);
    //保存
    $user->name = $request->name;
    $user->email = $request->email;
    $user->age = $request->birthday;
    $user->sex_id = $request->sex;
    $user->save();
    //リダイレクト
    return redirect('user');
    }

}
