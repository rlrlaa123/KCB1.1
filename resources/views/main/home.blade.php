@extends('layouts.app')

@section('style')
    <style>

        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }

        body {
            width: 100%;
            height: 100%;
        }

        .body1 {
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 1fr 1vw 1fr;
            grid-column-gap: 1vw;
            grid-template-columns: 55% 45%;
            margin: 1vw 15vw 1vw 15vw;
            text-align: center;
            width: 75%;
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

        .homemenu1 {
            width: 100%;
            overflow: hidden;
            padding: 0vw 3vw 1vw 3vw;
        }

        .homemenu2 {
            width: 100%;
            overflow: hidden;
            padding: 0vw 3vw 1vw 3vw;
        }

        .homemenu1item {
            padding: 8px 16px;
            float: left;
            width: auto;
            border: none;
            display: block;
            outline: 0;
            background-color: white;
        }

        .body2 {
            width: auto;
            padding: 1vw 15vw 1vw 15vw;
            background-color: #e7e9f4;
        }

        .hotfocus_shortcut div {
            width: 100%;
            -ms-text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;
            justify-content: left;
        }

        .library_shortcut div {
            width: 100%;
            -ms-text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            text-align: left;
        }

        .homemenu2item {
            padding: 8px 16px;
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

        .advbanner {
            width: 100%;
            position: relative;
            margin: 1vw 15vw 1vw 15vw;
            height: 2vw;
        }

        .mySlides {
            display: none;
        }

        .advbanner img {
            vertical-align: middle;
            width: 1000px;
            height: 600px;
        }

        .advbannertext {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        .advbannernumbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .advbannerdot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .menu2 {
            height: 280px;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .advbannertext {
                font-size: 11px
            }
        }

        .partners {
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 1fr 1vw 1fr;
            grid-column-gap: 1vw;
            grid-template-columns: 35% 65%;
            margin: 1vw 15vw 1vw 15vw;
            text-align: center;
            width: 75%;
        }

        .library_shortcut {
            display: -ms-grid;
            display: grid;
            -ms-grid-columns: 1fr 1fr;
            grid-column-gap: 1vw;
            grid-template-columns: 80% 20%;
            text-align: center;
            width: 100%;
        }

        .searchform input {
            border: 1px solid #e85254;
        }

        .lens_button {
            padding: 0;
            margin: 0;
            border: #e85254;
            margin-left: 0;
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
    </style>
@endsection


@section('content')
    <div class="searchbarcontainer">
        <form class="navbar-form searchform" method="POST" action="{{url('queries.search')}}">
            <input type="search" class="form-control" placeholder="검색" size="30">
            <button type="search" class="lens_button"><img src="http://127.0.0.1:8000/img/searchbarbutton.png"/>
            </button>
        </form>
        <div>
            <a href="{{url('notice')}}" class="navbarotherpage">TODAY 보상 공고/공시</a>
            <a href="{{url('asking')}}" class="navbarotherpage">보상/용역 대행 컨설팅</a>
        </div>
    </div>
    <div class="body1">
        <div class="grid-item">
            <div class="homemenu1">
                <button class="homemenu1item" onclick="openmenu1('hotfocus')">HOT 포커스</button>
                <button class="homemenu1item" onclick="openmenu1('freesample')">무료샘플</button>
                <button class="_tothepage"><a href="/hotfocus">+더보기</a></button>
            </div>
            <div id="hotfocus" class="w3-container menu1">
                @forelse($hotfocus as $value)
                    <a href="{{ url('hotfocus/'.$value->hf_id) }}">
                        <div class="hotfocus_shortcut">
                            <div>{{$value->hf_title}}</div>
                        </div>
                    </a>
                @empty
                    <div style="text-align:center;">등록된 글이 없습니다.</div>
                @endforelse
            </div>
            <div id="freesample" class="w3-container menu1" style="display:none">
                <div style="text-align:center;">무료샘플이 없습니다.</div>
            </div>
        </div>
        <div class="grid-item">
            <div class="homemenu2">
                공지사항
                <a href="{{url('fyi')}}" class="_tothepage">+더보기</a>
                <hr>
                <div>
                    @forelse($fyi as $value)
                        <a href="{{ url('fyi/'.$value->fyi_id) }}">
                            <div class="library_shortcut">
                                <div>{{$value->fyi_title}}</div>
                                <div>{{$value->fyi_date}}</div>
                            </div>
                        </a>
                    @empty
                        <div style="text-align:center;">등록된 공지사항이 없습니다.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="advbanner">
        <div class="mySlides fade">
            <div class="advbannernumbertext">1 / 3</div>
            {{--<img src="/img/poster_1.jpg" width="50%">--}}
            <div class="advbannertext">Caption Text</div>
        </div>

        <div class="mySlides fade">
            <div class="advbannernumbertext">2 / 3</div>
            {{--<img src="/img/poster_2.jpg" width="50%">--}}
            <div class="advbannertext">Caption Two</div>
        </div>

        <div class="mySlides fade">
            <div class="advbannernumbertext">3 / 3</div>
            {{--<img src="/img/poster_3.jpg" width="50%">--}}
            <div class="advbannertext">Caption Three</div>
        </div>

    </div>
    <div style="text-align:center">
        <span class="advbannerdot"></span>
        <span class="advbannerdot"></span>
        <span class="advbannerdot"></span>
    </div>
    <div class="body2">
        <div>
            <div style="margin:1vw; border-bottom: 1px solid #7888c2;">
                <button id="library_shortcut_button1" class="homemenu2item"
                        onclick="openmenu2('data1'); highlight('library_shortcut_button1')"
                        style="border-right: 0.5px solid; border-bottom-style: none;">자료실
                </button>
                <button id="library_shortcut_button2" class="homemenu2item"
                        onclick="openmenu2('data2'); highlight('library_shortcut_button2')"
                        style="border-bottom-style:none;">자료실
                </button>
                <button class="_tothepage" style="background-color: #e7e9f4;"><a href="/library"
                                                                                 style="margin:8px 16px;">+더보기</a>
                </button>
            </div>
            <div id="data1" class="menu2">
                @forelse($library as $value)
                    <a href="{{ url('library/'.$value->library_id) }}">
                        <div class="library_shortcut">
                            <div>{{$value->library_title}}</div>
                            <div>{{$value->library_date}}</div>
                        </div>
                    </a>
                @empty
                    <div style="text-align:center;">등록된 글이 없습니다.</div>
                @endforelse
            </div>
        </div>
        <div id="data2" class="menu2" style="display:none">
            @forelse($library as $value)
                <a href="{{ url('library/'.$value->library_id) }}">
                    <div class="library_shortcut">
                        <div>{{$value->library_title}}</div>
                        <div>{{$value->library_date}}</div>
                    </div>
                </a>
            @empty
                <div style="text-align:center;">등록된 글이 없습니다.</div>
            @endforelse
        </div>
    </div>
    <div style="  margin: 1vw 15vw 1vw 15vw;">
        <h2>
            파트너사
        </h2>
        <hr/>
        <div class="partners">
            <div class="grid-item" style="float:left;">
                <img src="" width="100px">
            </div>
            <div class="grid-item" style="display:inline-block">
                <img src="" width="100px">
                <img src="" width="100px">
                <img src="" width="100px">
                <img src="" width="100px">
                <img src="" width="100px">
                <img src="" width="100px">
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("advbannerdot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 10000); // Change image every 2 seconds
        }

        function openmenu1(whichmenu) {
            var i;
            var x = document.getElementsByClassName("menu1");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(whichmenu).style.display = "block";
        }

        function openmenu2(whichmenu) {
            var i;
            var x = document.getElementsByClassName("menu2");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(whichmenu).style.display = "block";
        }

        function highlight(whichmenu) {
            var i;
            var x = document.getElementsByClassName("homemenu2item");
            for (i = 0; i < x.length; i++) {
                x[i].style.display.borderBottomStyle = "none";
            }
            document.getElementById(whichmenu).style.borderBottomStyle = "1px solid #E852514";
        }
    </script>
@endsection