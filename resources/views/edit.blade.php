@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    <body>
<div class="container m-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザー登録内容の変更</div>
        <div class="card-body">
          <form method="POST" action="/edit" enctype="multipart/form-data">
              <h2>氏名</h2>
              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
              <h2>email</h2>
              <input type="text" name="email" class="form-control" value="{{ $user->email }}">
              <h2>説明</h2>
              <input type="text" name="my_bicycle" class="form-control" value="{{ $user->my_bicycle }}">
              <button type="submit" class="user-btn">変更</button>
              {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    </body>
</html>
@endsection