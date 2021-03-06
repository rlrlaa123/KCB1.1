@extends('layouts.app')
@section('style')
    <style>
        body {
            font-weight: 700;
        }

        .searchbarcontainer {
            text-align: center;
            margin: 0;
            padding: 5vw;
            background-image: url('/img/navbarbackgroundpicture.png');
            -webkit-background-size: 100%;
            background-size:100% 100%;
            background-repeat: no-repeat;
        }

        .pagination {
            list-style: none;
        }

        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100%;
            min-height: 50%;
            overflow-x: hidden;
        }

        .body1 {
            word-break: keep-all;
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 1fr 3vw 1fr;
            grid-column-gap: 6vw;
            grid-template-columns: 60% 40%;
            margin: 1vw 15vw 1vw 15vw;
            text-align: center;
        }

        .body1 li {
            width: 80%;
            -ms-text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;

        }

        .grid-item:nth-child(2) {
            -ms-grid-column: 3;
        }

        .grid-item:nth-child(3) {
            -ms-grid-column: 5;
        }

        .grid-item:nth-child(5) {
            -ms-grid-column: 7;
        }

        .homemenu1 {
            width: 100%;
            overflow: hidden;
            border-bottom: 1px solid #bcc1e1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .homemenu2 {
            width: 100%;
            overflow: hidden;
            border-bottom: 1px solid #bcc1e1;

        }

        .homemenu1item {
            padding: 1.3vh 1.5vw;
            width: auto;
            border: none;
            outline: 0;
            background-color: white;
        }

        .homemenu2item {
            margin: 1.4vh 1.5vw;
            width: auto;
            border: none;
            outline: 0;
            background-color: white;
        }

        .body2 {
            width: auto;
            padding: 3vw 15vw;
            background-color: #e7e9f4;
        }

        .hotfocus_shortcut {
            padding: 0 3vw 0 1vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 25vh;
            border-bottom: 1px solid #bcc1e1;
        }

        .text-center {

        }

        .hotfocus_shortcut img {
            margin: 1vw;
            width: 50%;
            height: 80%;
            border: 1px solid #e85254;
        }

        .hotfocus_shortcut div {
            width: 100%;
            -ms-text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: center;
            cursor: pointer;
        }

        .rn_shortcut div {
            width: 100%;
            -ms-text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;
            cursor: pointer;
            font-size: 0.8vw;
            font-weight: 700;
            padding: 5px 10px;

        }

        .notice_shortcut div {
            width: 100%;
            -ms-text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;
            justify-content: left;
            cursor: pointer;
        }

        .homemenu3item {
            padding: 8px 24px;
            width: auto;
            border-top: none;
            border-left: none;
            border-right: none;
            display: inline;
            text-align: left;
            justify-content: left;
            outline: 0;
            background-color: #e7e9f4;
        }

        ._tothepage {
            border: none;
            color: grey;
            background-color: transparent;
            vertical-align: center;
            cursor: pointer;
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

        .partners {
            justify-content: space-between;
            /*display: -ms-grid;*/
            display: flex;
            /*-ms-grid-columns: 1fr 1vw 1fr;*/
            /* grid-column-gap: 1vw; */
            /* grid-template-columns: 35% 65%; */
            padding: 1vw;
            text-align: center;
            width: 100%;
            align-items: center;
        }

        .rn_shortcut {
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 0.2fr 1vw 2fr 1vw 0.3fr;
            grid-template-columns: 10% 70% 20%;
            text-align: center;
            width: 100%;
            border-bottom: 1px solid #7888c2;
        }

        .searchform input {
            border: 1px solid #e85254;
        }

        .lens_button {
            width: 5vh;
            height: 5vh;
            padding: 0;
            margin: 0;
            border: #e85254;
            background-color: #e85254;
            border-radius: 0.4vw;
        }

        .lens_button img {
            background-color: #e85254;
            padding: 0.1vw;
            margin: 0;
            border: none;
            width: 100%;
            height: 100%;
            cursor: pointer;
            border-radius: 50%;
            text-align: center;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('content')
    <div class="searchbarcontainer">
        <form class="navbar-form searchform" style="padding:1vh 1vw;" method="GET" action="{{url('/search/')}}">
            <input type="search" name="search" class="form-control" style="width:35%; font-size:1vw; height:5vh;" placeholder="검색"
                   size="40">
            <button type="submit" class="lens_button"><img src="/img/searchbarbutton.png"/>
            </button>
        </form>
        <div style="text-align:center;">
            <a href="{{url('notice')}}" class="navbarotherpage">TODAY 보상 공고/고시</a>
            <a href="{{url('/consulting')}}" class="navbarotherpage">보상 용역 대행 컨설팅</a>
        </div>
    </div>
    <div class="body1">
        <div class="grid-item">
            <div class="homemenu1">
                <div class="justify-content">
                    <div class="homemenu1item" id="hotfocus1" onclick="openmenu1('hotfocus'); give_effect('hotfocus1')"
                         style="font-size: 0.9vw; border-right: 0.8px solid #c4e3f3; border-bottom:2px solid #e85251;">
                        HOT 포커스
                    </div>
                    <div class="homemenu1item" id="freesample1"
                         onclick="openmenu1('freesample'); give_effect('freesample1')"
                         style="font-size: 0.9vw;">무료샘플
                    </div>
                </div>
                <div class="_tothepage" style="word-break:keep-all; font-size:0.9vw;"
                     onclick="location.href='{{url('/hotfocus')}}'">+더보기
                </div>
            </div>
            <div id="hotfocus" class="w3-container menu1">
                <div class="hotfocus_shortcut">
                    @forelse($hotfocus as $value)
                        <img onclick="tothedetailpage_hotfocus({{$value->hf_id}})"
                             src="/{{$value->hf_thumbnails}}" style="cursor:pointer;"/>
                    @empty
                        <div style="text-align:center; font-size:0.8vw;">등록된 글이 없습니다.</div>
                    @endforelse
                </div>
            </div>
            <div id="freesample" class="w3-container menu1" style="display:none; height:200px;">
                <div style="text-align:center; font-size:0.8vw;">무료샘플이 없습니다.</div>
            </div>
        </div>
        <div class="grid-item">
            <div class="homemenu2" style="font-size: 0.9vw;">
                <div class="homemenu2item" style="justify-content: space-between; display:flex; align-items: center ">
                    <div>TODAY 보상 공고/고시</div>
                    <a href="{{url('notice')}}" class="_tothepage" style="word-break:keep-all; font-size: 0.9vw;">+더보기</a></div>
            </div>
            <div>
                @forelse($notice as $value)
                    <div class="notice_shortcut" onclick="tothedetailpage_notice({{$value->id}})" style="cursor:pointer; padding: 1vh 0.5vw; font-size: 0.8vw;">
                        <div>{{$value->notice_title}}</div>
                    </div>
                @empty
                    <div style="text-align:center; font-size:0.8vw;">등록된 공지사항이 없습니다.</div>
                @endforelse
            </div>
        </div>
    </div>
    <div style="margin:1vw 15vw 1vw 15vw;">
        @include('layouts.partials.advbanner')
    </div>
    <div class="body2">
        <div>
            <div style="margin:1vw 0; border-bottom: 1px solid #7888c2; display:flex; justify-content: space-between; align-items: center;">
                <button id="rn_shortcut_button1" class="homemenu3item"
                        onclick="location.href='{{url('/relatednews')}}'"
                        style="border-bottom: 2px solid #e85251;
                         font-size:0.9vw; cursor:pointer;">관련 뉴스
                </button>
                <button class="_tothepage" style="background-color: #e7e9f4; cursor:pointer;"><a href="/relatednews" style="word-break:keep-all; margin:8px 16px; font-size:0.9vw;">+더보기</a>
                </button>
            </div>
            <div id="data1" class="menu2">
                @forelse($relatednews as $value)
                    <div class="rn_shortcut" onclick="tothedetailpage_relatednews({{$value->rn_id}})">
                        <div class="grid-item">{{ $value->rn_id }}</div>
                        <div class="grid-item">{{ $value->rn_title }}</div>
                        <div class="grid-item">{{ $value->rn_date }}</div>
                    </div>

                @empty
                    <div style="text-align:center; font-size:0.8vw;">등록된 글이 없습니다.</div>
                @endforelse
            </div>
        </div>
    </div>
    <div style="  margin: 1vw 12vw;">
        <div style="margin: 1vw 0;border-bottom: 1px solid #7888c2; justify-content: space-between; display:flex; align-items: center;">
            <h2 style="font-weight:700; font-size:0.9vw; padding: 8px 16px; margin:0; border-bottom: 2px solid #e85251; cursor:pointer; "
                onclick="location.href='{{url('/useful_website')}}'">
                유용한 사이트
            </h2></div>
        <div class="partners">
            <div class="grid-item" style="display:inline-block">
                <a href="http://klis.seoul.go.kr/sis/main.do" target="__blank"><img src="/img/klis.png" width="100%"></a>
            </div>
            <div class="grid-item" style="display:inline-block">
                <a href="http://www.law.go.kr/" target="__blank"><img src="/img/infocenter.png" width="100%"></a>
            </div>
            <div class="grid-item" style="display:inline-block">
                <a href="http://www.moleg.go.kr/main.html" target="__blank"><img src="/img/moleg_logo.png" width="100%"></a>
            </div>
            <div class="grid-item" style="display:inline-block;">
                <a href="http://www.nsdi.go.kr/lxportal/?menuno=2679" target="__blank"><img src="/img/nsdi_logo.png" width="100%"></a>
            </div>
            <div class="grid-item" style="display:inline-block">
                <a href="http://www.onbid.co.kr/" target="__blank"><img src="/img/onbid.png" width="100%"></a>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>

        function openmenu1(whichmenu) {
            var i;
            var x = document.getElementsByClassName("menu1");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(whichmenu).style.display = "block";
        }

        function give_effect(whichmenu) {
            var i;
            var x = document.getElementsByClassName("homemenu1item");
            for (i = 0; i < x.length; i++) {
                x[i].style.borderBottom = "none";
            }
            document.getElementById(whichmenu).style.borderBottom = "2px solid #e85251";
        }

        function openmenu2(whichmenu) {
            var i;
            var x = document.getElementsByClassName("menu2");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(whichmenu).style.display = "block";
        }

        function tothedetailpage_hotfocus(id) {
            @if(\Illuminate\Support\Facades\Auth::guest())
            alert('회원 가입 후에 열람하실 수 있습니다.');
                    @else
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/hotfocus/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
            @endif
        }

        function tothedetailpage_notice(id) {

            location.href = "/notice/" + id;
        }

        function tothedetailpage_relatednews(id) {
            @if(\Illuminate\Support\Facades\Auth::guest())
            alert('회원 가입 후에 열람하실 수 있습니다.');
                    @else
            var role = "{{ Auth::user()->checkPremium(Auth::user()->grade) }}";
            if (role === "1") {
                location.href = "/relatednews/" + id;
            }
            else {
                alert('프리미엄 회원만 열람이 가능합니다.');
            }
            @endif
        }
    </script>
@endsection