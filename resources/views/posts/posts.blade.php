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
      <h1>サイクリング情報</h1>
      [<a href='/user'>profile</a>]
      [<a href='/posts'>サイクリング情報</a>]
      [<a href='/events'>イベント情報</a>]
      [<a href='/posts/create'>create</a>]
      <div class='posts'>
        @foreach ($posts as $post)
          <div class='post'>
            {{ $post->user->name}}
            {{ $post->category->category }}
            <h2 class='title'>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <p class='body'>{{ $post->body}}</p>
          </div>
        @endforeach
      </div>
    </body>
</html>
@endsection