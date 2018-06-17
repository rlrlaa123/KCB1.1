@extends('layouts.app')
<style>

    .display_grid{

        display: -ms-grid;
        display:grid;
        grid-column-gap: 5vw;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr 1vw 1fr;
        grid-template-columns: 25% 25% 25% 25%;
        padding:0;
        text-align: center;

    }
    .image_text_container {
        text-align: left;
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
        padding: 0;
        margin: 0;
    }

    .text-block p {
        margin: 0;
        text-align: center;
        -ms-text-overflow: ellipsis;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        height: 20%;

    }

    .noticepage {
        margin: 1vw 15vw 1vw 15vw;
    }

    .noticepage table {
        width: auto;
    }

    .noticepage img {
        width: 9.6vw;
        height: 80%;
    }

    .noticepage td {
        display: inline-block;
        display:-moz-inline-block;
        align-items: center;
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
        <div class="justify-content">
            <div class="notice-selector {{ $_SERVER['REQUEST_URI'] === '/notice' ? 'judicialpage_list_onpage' : ''}}"
                 onclick="location.href='/notice';">TODAY 공고/공시
            </div>
            <div>
                <form class="navbar-form searchform" method="GET" action="{{url('/noticesearch/')}}">
                    <input type="search" name="search" class="form-control" placeholder="검색어를 입력하세요."
                           style="height: 3vh; width: 15vw; padding:0;">
                    <button type="submit" class="lens_button1"><img
                                src="/img/searchbarbutton1.png"/>
                    </button>
                </form>
            </div>
        </div>
        <hr/>
        <table>
            <tr class="display_grid">
                @forelse($notexpired as $value)
                    <td class="notexpired grid-item">
                        <a onclick="tothedetailpage({{$value->notice_id}})">
                            <table>
                                <tr>
                                    <td>
                                        <div class="image_text_container"><img
                                                    src="/{{$value->notice_thumbnails}}">
                                            <div class="text-block" style="width:9.6vw;"><p>{{$value->notice_title}}</p></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </a></td>
                @empty
                @endforelse
                @foreach($data as $value)
                    <td class="expired">
                        <a onclick="tothedetailpage({{$value->notice_id}})">
                            <table>
                                <tr>
                                    <td>
                                        <div class="image_text_container"><img
                                                    src="/{{ $value->notice_thumbnails }}">
                                            <div class="text-block"><p>{{$value->notice_title}}</p></div>
                                        </div>
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
    <script>
        function tothedetailpage(id) {
            // Premium 회원일 때만 접근 가능!
            console.log();
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/notice/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
        }
    </script>
@endsection