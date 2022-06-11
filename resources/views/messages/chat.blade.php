@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    </head>
    <body>
        <div id="your_container">
        <!-- チャットの外側部分① -->
        <div id="bms_messages_container">
            <!-- ヘッダー部分② -->
            <div id="bms_chat_header">
                <!--ステータス-->
                <div id="bms_chat_user_status">
                    <!--ステータスアイコン-->
                    <div id="bms_status_icon">●</div>
                    <!--ユーザー名-->
                    <div id="bms_chat_user_name">{{$group->event->title}}</div>
                </div>
            </div>

            <!-- タイムライン部分③ -->
            <div id="bms_messages">
                @foreach($chats as $chat)
                    @if($chat->event_id === $group->event_id)
                    @if($chat->user_id === Auth::user()->id)
                        <div class="bms_message bms_right">
                            <div class="bms_message_box">
                                <div class="bms_message_content">
                                    <div class="bms_message_text">{{$chat->message}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
                    @else
                        <div class="bms_message bms_left">
                            <div class="bms_message_box">
                                <div class="bms_message_content">
                                    <div>●{{$chat->user->name}}</div>
                                    <div class="bms_message_text">{{$chat->message}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="bms_clear"></div><!-- 回り込みを解除（スタイルはcssで充てる） -->
                    @endif
                    @else
                    @endif
                    @endforeach
            <!-- テキストボックス、送信ボタン④ -->
            <form action="/groupchat/{{ $group->event_id}}" method=POST>
                @csrf
            <div id="bms_send">
                <textarea id="bms_send_message" name="message"></textarea>
                
                <input type="submit" value="送信" id="bms_send_btn"/>
            </div>
            </form>
        </div>
    </div>
    <div class="border-bottom text-center">
        [<a href='/groupchat'>グループ選択に戻る</a>]
    </div>
    </body>
</html>
@endsection