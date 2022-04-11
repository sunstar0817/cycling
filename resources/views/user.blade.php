@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="container m-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">ユーザー登録内容</div>
                  <h2>アイコン</h2>
                  <div class='icon'>
                      <img class="rounded-circle" src="https://cycling1.s3.ap-northeast-1.amazonaws.com/icon/icon_144010_256.png">
                  </div>
                  {{Auth::user()->image}}
                  <h2>バイク写真</h2>
                  {{Auth::user()->bicycle_image}}
                  <h2>氏名</h2>
                  <input class="form-control" value="{{ $user->name }}">
                  <h2>email</h2>
                  <input class="form-control" value="{{ $user->email }}">
                  <h2>誕生日</h2>
                  <input class="form-control" value="{{ $user->age }}">
                  <h2>性別</h2>
                  @if($user->sex_id === null)
                  @else <input class="form-control" value="{{ $user->sex->sex }}"}>
                  @endif
                  <h2>説明</h2>
                  <input class="form-control" value="{{ $user->my_bicycle }}">
                  <a href="{{ action('CyclingController@edit') }}"><button class="user-btn">ユーザー登録内容の編集</button></a>
                  <a href="/posts">戻る</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
@endsection