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
        <h1>投稿作成画面</h1>
        <form action="/posts" method=POST enctype="multipart/form-data">
        @csrf
        <div class="title">
            <h2>見出し</h2>
            <input type="text" name="post_title" placeholder="タイトル"/>
        </div>
        <div class="body">
            <h2>投稿詳細</h2>
            <textarea name="post_body" placeholder="詳細を記入してください"></textarea> 
        </div>
        <div class="category">
            <h2>投稿種類</h2>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
            </select>
        </div>
            <input type="file" name="image">
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/posts">戻る</a>]</div>
    </body>
</html>
@endsection