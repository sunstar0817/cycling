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
      <h1 class="title">{{ $post->title }}</h1>
        {{ $post->category->category }}
        <div class="content">
            <div class="content__post">
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/posts">戻る</a>
        </div>
    </body>
</html>
@endsection