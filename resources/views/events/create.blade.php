@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <div class="card">
        <h1>イベント作成画面</h1>
        <form action="/events" method=POST enctype="multipart/form-data">
        @csrf
        <div class="title">
            <h2>見出し</h2>
            <input type="text" name="event_title" placeholder="タイトル"/>
        </div>
        <div class="body">
            <h2>イベント詳細</h2>
            <textarea name="event_body" placeholder="詳細を記入してください"></textarea> 
        </div>
        <div class="category">
            <h2>イベント種類</h2>
            <select name="area_id">
                @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
            </select>
        </div>
            <input type="file" name="image">
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/events">戻る</a>]</div>
        </div>
        </div>
    </body>
</html>
@endsection