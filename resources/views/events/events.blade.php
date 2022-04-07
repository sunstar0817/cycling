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
      <h1>イベント情報</h1>
      [<a href='/user'>profile</a>]
      [<a href='/posts'>サイクリング情報</a>]
      [<a href='/events'>イベント情報</a>]
      [<a href='/events/create'>create</a>]
      <div class='events'>
        @foreach ($events as $event)
          <div class='event'>
            {{ $event->user->name}}
            {{ $event->area->name }}
            <h2 class='title'>
            <a href="/events/{{ $event->id }}">{{ $event->title }}</a>
            <img src="{{ $event->image }}">
            </h2>
            <p class='body'>{{ $event->body}}</p>
          </div>
        @endforeach
      </div>
    </body>
</html>
@endsection