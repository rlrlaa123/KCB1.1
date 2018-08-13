@extends('layouts.app')
@section('style')
    <style>

        .display_content table {
            width: 100%;
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

        .searchbarcontainer {
            text-align: center;
            margin: 0;
            padding: 5vw;
            background-image: url('/img/navbarbackgroundpicture.png');
            -webkit-background-size: 100%;
            background-size: 100%;
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
            <div class="display_content">
                @forelse($notice as $value)
                    @if( $value->created_at > $sub_days )
                        <div onclick="tothedetailpage({{$value->id}})" class="notexpired grid-item">
                            <div class="image_text_container"><img
                                        src="/{{$image = \App\Notice_photo::where('notice_id',$value->id)->first()->fileimage}}"
                                        width="100%" height="85%">
                                <div class="text-block" style="width:100.3%;"><p>[{{$value->location}}
                                        ] {{$value->notice_title}}</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div onclick="tothedetailpage({{$value->id}})" class="expired grid-item">
                            <div class="image_text_container"><img
                                        src="/{{$image = \App\Notice_photo::where('notice_id',$value->id)->first()->fileimage}}">
                                <div class="text-block" style="width:100.3%;"><p>[{{$value->location}}
                                        ] {{$value->notice_title}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                @endforelse
            </div>
        </div>
        <div class="judicialresult">
            <h3>유권해석/판례</h3>
            <hr/>
            <div>
                <table class="pagecontents">
                    <thead>
                    <tr>
                        <th class="th1 table_id">번호</th>
                        <th class="th2 table_dash_id">구분</th>
                        <th class="th1 table_title">제목</th>
                        <th class="th2 table_date">날짜</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($judicial as $value)
                        <tr class="tothedetailpage" onclick="tothedetailpage({{$value->j_id}})">
                            <td class="td1">{{$value->j_id}}</td>
                            <td class="td2">보상판례</td>
                            <td>{{$value->j_title}}</td>
                            <td class="td1">{{$value->j_date}}</td>
                        </tr>
                    @empty
                        <td colspan="4">해당 글이 없습니다.</td>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="libraryresult">
            <h3>자료실</h3>
            <hr/>
            <div>
                <table class="pagecontents">
                    <thead>
                    <tr>
                        <th class="th2 table_id">번호</th>
                        <th class="th1">제목</th>
                        <th class="th2 table_date">날짜</th>
                    </tr>
                    </thead>
                    @forelse($library as $value)
                        <tr class="tothedetailpage" onclick="tothedetailpage({{$value->library_id}})">
                            <td class="td1">{{$value->library_id}}</td>
                            <td class="library_title">{{$value->library_title}}</td>
                            <td class="td1">{{$value->library_date}}</td>
                        </tr>
                    @empty
                        <td colspan="3">해당 글이 없습니다.</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
@endsection