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
        <header class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <h1>イベント情報</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <p>[承認]</p>
                    [<a href='/user'>profile</a>]
                </div>
            </div>
        </header>
        <hr>
        <section class="selection">
            <div class="row">
                <div class="col-sm-4 text-center">
                    [<a href='/posts'>サイクリング情報</a>]
                </div>
                <div class="col-sm-4 text-center">
                    [<a href='/events'>イベント情報</a>]
                </div>
                <div class="col-sm-4 text-center">
                    [<a fref='/posts'>チャット</a>]
                </div>
            </div>
                <hr>
                <div class="border-bottom text-center">
                    [<a href='/events/create'>create</a>]
                </div>
        </section>
        <div class="container">
            <section class="information">
                <div class='events'>
                    @foreach ($events as $event)
                      <div class='event'>
                              <h2>{{ $event->area->name }}のサイクリング</h2>
                              <div class="row">
                                  <div class="col-sm-3 text-center">
                                      <p>ユーザのアイコン</p>
                                  </div>
                                  <div class="col-sm-9 text-left">
                                      <h4>{{ $event->user->name}}</h4>
                                  </div>
                              </div>
                          <div class="border-top">
                              <h3><a href="/events/{{ $event->id }}">{{ $event->title }}</a></h3>
                          </div>
                          <div>
                              @if($event->image === null)
                              @else<img src="{{ $event->image }}">
                              @endif
                          </div>
                          <div>
                              <p class='body'>{{ $event->body}}</p>
                        </div>
                              @if($event->user_id === Auth::user()->id)
                              @else<p class="border text-center">走りたいボタン</p>
                              @endif
                      </div>
                   @endforeach
                </div>
            </section>
        </div>
        <section class="container">
            <div class="d-flex justify-content-center">
                {{ $events->links() }}
            </div>
        </section>
    </body>
</html>
@endsection