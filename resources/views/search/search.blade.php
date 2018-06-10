@extends('layouts.app')

@section('style')
    <style>

        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
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

        .title {
            color: #98644f;
        }
        .content{
            margin: 1vw 15vw 1vw 15vw;
        }
        .resulttitle{
            color:#556fb4;
            font-weight:700;
            margin-bottom:0;
        }
        .justify-content{
            display:flex;
            justify-content: space-between;
            align-items: center;
        }
        .see_more_result{
            font-weight:400;
            color:grey;
            font-size:1vw;
            cursor:pointer;
        }
    </style>
@endsection


@section('content')
    <div class="searchbarcontainer">
        <form class="navbar-form searchform" method="GET" action="{{url('search/')}}">
            <input type="search" name="search" class="form-control" placeholder="검색" size="40">
            <button type="search" class="lens_button"><img src="http://127.0.0.1:8000/img/searchbarbutton.png"/>
            </button>
        </form>
        <div>
            <a href="{{url('notice')}}" class="navbarotherpage">TODAY 보상 공고/공시</a>
            <a href="{{url('asking')}}" class="navbarotherpage">보상/용역 대행 컨설팅</a>
        </div>
    </div>
    <hr/>
    <div class="content">
        <div class="noticeresult">
            <div class="justify-content"><h3 class="resulttitle">공고/ 고시</h3><div class="see_more_result" onclick="window.open('/notice')">검색 결과 더 보기 ></div></div>
            <hr/>
            <table>
                <tr>
                    @forelse($notice as $value)
                        <td>
                            <a href="{{ url('notice/'.$value->notice_id) }}">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="image_text_container"><img
                                                        src="http://127.0.0.1:8000/{{ $value->notice_thumbnails }}">
                                                <div class="text-block"><p>{{$value->notice_title}}</p></div>
                                            </div>
                                        </td>
                                </table>
                            </a>
                        </td>
                    @empty
                        <div><b style="color:red;">"{{$requests->search}}"</b>에 대해 검색하신 결과가 없습니다.</div>
                    @endforelse
                </tr>
            </table>
        </div>
        <div class="judicialresult">
            <div class="justify-content"><h3 class="resulttitle">유권해석/판례</h3><div class="see_more_result" onclick="window.open('/judicial')">검색 결과 더 보기 ></div></div>
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
                    <div><b style="color:red;">"{{$requests->search}}"</b>에 대해 검색하신 결과가 없습니다.</div>
                @endforelse
            </div>
        </div>
        <div class="libraryresult">
            <div class="justify-content"><h3 class="resulttitle">자료실</h3><div class="see_more_result" onclick="window.open('/library')">검색 결과 더 보기 ></div></div>
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
                    <div><b style="color:red;">"{{$requests->search}}"</b>에 대해 검색하신 결과가 없습니다.</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection