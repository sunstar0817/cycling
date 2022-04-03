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
      <h1 class="title">{{ $event->title }}</h1>
        {{ $event->area->name }}
        <div class="content">
            <div class="content__post">
                <p>{{ $event->body }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/events">戻る</a>
        </div>
    </body>
</html>
@endsection