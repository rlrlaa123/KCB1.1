@extends('layouts.app')

@section('style')
    <style>
        .searchbarcontainer {
            text-align: center;
            margin: 0;
            padding: 5vw;
            background-image: url('/img/navbarbackgroundpicture.png');
            -webkit-background-size: 100%;
            background-size:100%;
            background-repeat: no-repeat;
        }
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        .wrapper {
            margin: 1vw 15vw 1vw 15vw;
        }

        ._tothepage {
            float: right;
            border: none;
            color: grey;
            background-color: transparent;
            vertical-align: center;
        }

        ._tothepage:hover {
            text-decoration: none;
            color: grey;
        }

        ._tothepage a {
            color: grey;
            vertical-align: center;
        }

        ._tothepage a:hover {
            text-decoration: none;
            color: grey;
        }

        .searchform input {
            border: 1px solid #e85254;
        }

        .lens_button {
            padding: 0;
            margin: 0;
            border: #e85254;
            background-color: #e85254;
            border-radius: 0.4vw;
        }

        .lens_button img {
            background-color: #e85254;
            padding: 6px;
            margin: 0;
            border: none;
            width: 38px;
            height: 35px;
            cursor: pointer;
            border-radius: 0.4vw;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        h3 {
            color: #546eb4;
        }

        .title {
            color: #98644f;
        }

        .image_text_container {
            margin: 0 5px;
        }

        .image_text_container img {
            width: 100%;
            height: 66px;
        }
    </style>
@endsection


@section('content')
    <div class="searchbarcontainer">
        <form class="navbar-form searchform" method="POST" action="{{url('search/')}}">
            <input type="search" class="form-control" placeholder="검색" size="40">
            <button type="search" class="lens_button"><img src="img/searchbarbutton.png"/>
            </button>
        </form>
        <div>
            <a href="{{url('notice')}}" class="navbarotherpage">TODAY 보상 공고/공시</a>
            <a href="{{url('asking')}}" class="navbarotherpage">보상/용역 대행 컨설팅</a>
        </div>
    </div>
    <hr/>
    <div class="wrapper">
        <div class="noticeresult">
            <h3>공고/고시</h3>
            <table>
                <tr>
                    @forelse($notice as $value)
                        <td class="expired">
                            <a href="{{ url('notice/'.$value->notice_id) }}">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="image_text_container">
                                                <img src="/{{ $value->notice_thumbnails }}">
                                                <div class="text-block"><p>{{$value->notice_title}}</p></div>
                                            </div>
                                        </td>
                                </table>
                            </a>
                        </td>
                    @empty
                        <div>검색하신 결과가 없습니다.</div>
                    @endforelse
                </tr>
            </table>
        </div>
        <div class="judicialresult">
            <h3>유권해석/판례</h3>
            <hr/>
            <div>
                @forelse($judicial as $value)
                    <div class="tothedetailpage" onclick="location.href='{{url('judicial/'.$value->j_id)}}'">
                        <div class="title">{{$value->j_title}}</div>
                        <div>{{$value->j_date}}</div>
                    </div>
                    <div>
                        {{$value->j_content}}
                    </div>
                @empty
                    <div>검색하신 결과가 없습니다.</div>
                @endforelse
            </div>
        </div>
        <div class="libraryresult">
            <h3>자료실</h3>
            <hr/>
            <div>
                @forelse($library as $value)
                    <div class="tothedetailpage" onclick="location.href='{{url('library/'.$value->library_id)}}'">
                        <div class="title">{{$value->library_title}}</div>
                        <div>{{$value->library_date}}</div>
                    </div>
                    <div>
                        {{$value->library_content}}
                    </div>
                @empty
                    <div>검색하신 결과가 없습니다.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection