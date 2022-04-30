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
                    <h1>チャット</h1>
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
                    [<a href='/posts'>サイクリング情報</a>]
                </div>
                <div class="col-sm-4 text-center">
                    [<a href='/events'>イベント情報</a>]
                </div>
                <div class="col-sm-4 text-center">
                    [<a href='/groupchat'>チャット</a>]
                </div>
            </div>
                <hr>
                <div class="border-bottom text-center">
                    [<a href='/posts'>戻る</a>]
                </div>
        </section>
         <div class="container">
            <section class="information">
                <div class='events'>
                    @foreach ($events as $event)
                    @if($event->user_id === Auth::id())
                      <div class='event'>
                              <h2><a href='/chat'>{{ $event->title }}</a></h2>
                              <div class="row">
                                  <div class="col-sm-2 text-center">
                                      <div class='icon'>
                                            <img class="rounded-circle" src="https://cycling1.s3.ap-northeast-1.amazonaws.com/icon/icon_144010_256.png">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 text-left">
                                      <h4>主催者：{{ $event->user->name }}</h4>
                                  </div>
                              </div>
                      </div>
                    @else
                    @endif
                   @endforeach
                    @foreach ($groups as $group)
                    @if($group->event->user_id === Auth::id())
                    @else
                    @if($group->confirmation === '2' )
                      <div class='event'>
                              <h2><a href='/chat'>{{ $group->event->title }}</a></h2>
                              <div class="row">
                                  <div class="col-sm-2 text-center">
                                      <div class='icon'>
                                            <img class="rounded-circle" src="https://cycling1.s3.ap-northeast-1.amazonaws.com/icon/icon_144010_256.png">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 text-left">
                                      <h4>主題者：{{ $group->event->user->name }}</h4>
                                  </div>
                              </div>
                      </div>
                    @else
                    @endif
                    @endif
                   @endforeach
                </div>
            </section>
        </div>
    </body>
</html>
@endsection