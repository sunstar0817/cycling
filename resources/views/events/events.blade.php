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
                    [<a href='/confirmation'>承認</a>]
                    [<a href='/user'>profile</a>]
                </div>
            </div>
        </header>
        <hr>
        <section class="selection">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <a href='/posts' class="btn btn-svg">
                    <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                    </svg>
                    <span>サイクリング情報</span>
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href='/events' class="btn btn-svg">
                    <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                    </svg>
                    <span>イベント情報</span>
                    </a>
                </div>
                <div class="col-sm-4 text-center">
                    <a href='/groupchat' class="btn btn-svg">
                    <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                    </svg>
                    <span>チャット</span>
                    </a>
                </div>
            </div>
            <hr>
                <div class="border-bottom text-center">
                    <a href='/events/create' class="btn btn-svg">
                    <svg>
                    <rect x="2" y="2" rx="0" fill="none" width=200 height="50"></rect>
                    </svg>
                    <span>イベントを作る</span>
                    </a>
                </div>
        </section>
        <div class="container">
            <section class="information">
                <div class='events'>
                    @foreach ($events as $event)
                      <div class='event'>
                              <h2>{{ $event->area->name }}のサイクリング</h2>
                              <div class="row">
                                  <div class="col-sm-2 text-center">
                                      <div class='icon'>
                                            <img class="rounded-circle" src="https://cycling1.s3.ap-northeast-1.amazonaws.com/icon/icon_144010_256.png">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 text-left">
                                      <h4>{{ $event->user->name}}</h4>
                                  </div>
                              </div>
                          <div class="border-top">
                              <h3>{{ $event->title }}</h3>
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
                              @else
                              <form action="/groups" method="POST">
                                  @csrf
                                  <div  class="border-top" align="center">
                                  <button type="submit" name="add">走りたい</button>
                                  </div>
                                  <input type="hidden" name="event_id" value="{{ $event->id }}"/>
                            　</form>
                              @endif
                      </div>
                   @endforeach
                </div>
            </section>
        </div>
        <section class="container">
            <div class="d-flex justify-content-center">
                {{ $events->links('pagination::bootstrap-4') }}
            </div>
        </section>
    </body>
</html>
@endsection