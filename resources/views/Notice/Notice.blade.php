@extends('layouts.app')
<style>

    .image_text_container {
        position: relative;
        width: 14vw;
        height: 19vh;
    }

    /* Bottom right text */
    .text-block {
        background-color: black;
        bottom: 0;
        color: white;
        width: 100%;
        opacity: 0.6;
        text-align: center;
        padding:0;
        margin:0;
    }
    .text-block p{
        margin:0;
        text-align: center;
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width:100%;
        height:20%;

    }
    .noticepage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .noticepage table {
        width: auto;
    }

    .noticepage img {
        width: 14vw;
        height: 80%;
    }

    .noticepage td {
        display: inline-flex;
        justify-content: space-between;
    }

    .notexpired {
        text-align: center;
        border: solid 2px #e85254;
        margin: 1vw;
    }

    .expired {
        text-align: center;
        border: solid 1px #3b5493;
        margin: 1vw;

    }

    .notice-selector {
        cursor: pointer;
        padding: 0.7vw;
        font-weight: 600;
        justify-content: left;
        text-align: left;
        font-size: 1.5vw;
        width: 25%;
        color: black
    }

    .notice-selector:hover {
        font-size: 1.7vw;
        color: #e85254;
        font-weight: 800;
    }
</style>
@section('content')
    <div class="noticepage">
        <div class="notice-selector {{ $_SERVER['REQUEST_URI'] === '/notice' ? 'judicialpage_list_onpage' : ''}}"
             onclick="location.href='/notice';">TODAY 공고/공시
        </div>
        <hr/>
        <table>
            <tr>
                @forelse($notexpired as $not_expired)
                    <td class="notexpired">
                        <a href="{{ url('notice/'.$not_expired->notice_id) }}">
                            <table>
                                <tr>
                                    <td>
                                        <div class="image_text_container"><img src="http://127.0.0.1:8000/{{ $not_expired->notice_thumbnails }}">
                                            <div class="text-block"><p>{{$not_expired->notice_title}}</p></div></div>
                                    </td>
                                </tr>
                            </table>
                        </a></td>
                @empty
                @endforelse
                @foreach($data as $value)
                    <td class="expired">
                        <a href="{{ url('notice/'.$value->notice_id) }}">
                            <table>
                                <tr>
                                    <td>
                                        <div class="image_text_container"><img src="http://127.0.0.1:8000/{{ $value->notice_thumbnails }}">
                                            <div class="text-block"><p>{{$value->notice_title}}</p></div></div>
                                    </td>
                            </table>
                        </a>
                    </td>
                @endforeach
            </tr>
        </table>
        @if($notexpired->count())
            <div class="text-center">
                {!! $notexpired->render() !!}
            </div>
        @endif
        @if($data->count())
            <div class="text-center">
                {!! $data->render() !!}
            </div>
        @endif
    </div>
@endsection