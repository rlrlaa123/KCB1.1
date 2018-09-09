<style>
    .submenu > div{
        word-break: keep-all;
        line-height: 150%;
    }
    .navbarheader_sub {
        width: 100%;
        margin:0;
        padding: 0 15vw;
        line-height: 2.6vw;
        display: none;
        position: absolute;
        background-color:white;
        border-bottom: 1px solid #cccccc;
    }


    .sub_grid{
        width:100%;
        display: grid;
        display: -ms-grid;
        -ms-grid-columns: 1fr 1vw 1fr 1vw 1fr 1vw 1fr 1vw 1fr 1vw 1fr;
        grid-template-columns: 16.6% 16.6% 16.6% 16.6% 16.6% 16.6%;
    }


    .navigationmenu_sub > div:hover{
        color: #556fb4!important;
    }
    .navbarheader_sub > div > div {
        width: 100%;
        display: block;
        background-color: #FFFFFF;
    }

    .navbarheader_sub > div > div > div {
        padding: 1vh 0;
        font-size: 0.9vw;
        font-weight: 700;
        text-align: center;
        display: block;
        cursor: pointer;
    }

    .navbarheader_sub > div > div > div:hover {
        background-color: #ddd;
    }

    .navigationmenu:hover .navbarheader_sub {
        display: block;
    }
</style>
{{--<script>--}}
{{--function showsubmenu(id) {--}}
{{--var i;--}}
{{--var x = document.getElementsByClassName('submenu');--}}
{{--for (i = 0; i < x.length; i++) {--}}
{{--x[i].style.display = "none";--}}
{{--document.getElementById(id).style.display = 'block';--}}
{{--}--}}
{{--}--}}
{{--</script>--}}
<div class="navigationheader">
    <a href="/"><img src="/img/KCB_logo.png" sizes="200"
                     title="logo" alt="logo" align="left"></a>
    <span><ul style="margin:0;">
            @guest
                <li><a href="{{ route('login') }}">로그인</a></li>
                <li><a href="{{ url('agreement') }}">회원가입</a></li>
                <li><a href="{{url('fyi')}}">공지사항</a></li>
                <li><a href="{{url('fee')}}">요금표 안내</a></li>
                {{--<li><a href="">고객센터</a></li>--}}
                {{--<li>--}}
                {{--<div class="dropdown">--}}
                {{--<button class="dropbtn menu_btn" type="button">전체메뉴--}}
                {{--<span class="caret"></span></button>--}}
                {{--<div class="dropdown-content">--}}
                {{--<a href="{{url('intro')}}">회사소개</a>--}}
                {{--<a href="{{url('agreement')}}">회원가입</a>--}}
                {{--<a href="{{url('login')}}">로그인</a>--}}
                {{--<a href="{{url('fyi')}}">공지사항</a>--}}
                {{--<a href="{{url('fee')}}">요금표 안내</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</li>--}}
            @else
                <li>
                  <div class="dropdown">
                        <button class="dropbtn menu_btn" type="button">{{ \Illuminate\Support\Facades\Auth::user()->name }}
                            <span class="caret"></span></button>
                        <div class="dropdown-content">
                            <a href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                  </div>
                </li>
                <li><a href="{{url('myinfo')}}">나의 정보</a></li>
                <li><a href="{{url('fyi')}}">공지사항</a></li>
                <li><a href="{{url('fee')}}">요금표 안내</a></li>
                {{--<li><a href="">고객센터</a></li>--}}
                {{--<li>--}}
                {{--<div class="dropdown">--}}
                {{--<button class="dropbtn menu_btn" type="button">전체메뉴--}}
                {{--<span class="caret"></span></button>--}}
                {{--<div class="dropdown-content">--}}
                {{--<a href="{{url('intro')}}">회사소개</a>--}}
                {{--<a href="{{url('agreement')}}">나의 정보</a>--}}
                {{--<a href="{{url('notice')}}">공고/고시</a>--}}
                {{--<a href="{{url('fyi')}}">공지사항</a>--}}
                {{--<a href="{{url('fee')}}">요금표 안내</a>--}}
                {{--<a href="{{url('/consulting')}}">보상 용역 대행 컨설팅</a>--}}
                {{--<a href="{{url('dev_info')}}">개발사업정보검색</a>--}}
                {{--<a href="{{url('judicial')}}">유권해석&판례</a>--}}
                {{--<a href="{{url('hotfocus')}}">HOT 포커스</a>--}}
                {{--<a href="{{url('policy')}}">규정지침</a>--}}
                {{--<a href="{{url('relatednews')}}">관련 뉴스</a>--}}
                {{--<a href="{{url('library')}}">자료실</a>--}}
                {{--<a href="{{url('articles')}}">커뮤니티</a>--}}
                {{--<a href="{{url('report')}}">신고하기</a>--}}
                {{--<a href="{{url('asking')}}">상담하기</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</li>--}}
            @endguest
        </ul></span>

</div>
<div class="navigationmenu">
    <div class="navigationmenu_sub">
        <div id="intro" class="intro grid-item {{  preg_match('/\/location/', $_SERVER['REQUEST_URI'])||preg_match('/\/intro/', $_SERVER['REQUEST_URI'])||preg_match('/\/history/', $_SERVER['REQUEST_URI']) ? 'onPage' : ''}}"
             onclick="location.href='/intro';">회사소개</div>
        <div id="notice" class="notice grid-item {{preg_match('/\/notice/', $_SERVER['REQUEST_URI'])||preg_match('/\/notice_all/', $_SERVER['REQUEST_URI']) ? 'onPage' : ''}}"
             onclick="location.href='/notice';">공고/고시</div>
        <div id="dev_info" class="dev_info grid-item {{preg_match('/\/dev_info/', $_SERVER['REQUEST_URI']) ? 'onPage' : ''}}"
             onclick="location.href='/dev_info';">개발사업 정보</div>
        <div id="judicial" class="judicial grid-item {{preg_match('/\/jvudicial/', $_SERVER['REQUEST_URI'])||preg_match('/\/hotfocus/', $_SERVER['REQUEST_URI'])||preg_match('/\/policy/', $_SERVER['REQUEST_URI']) ? 'onPage' : ''}}"
             onclick="location.href='/judicial';">유권해석/판례</div>
        <div id="library" class="library grid-item {{ preg_match('/\/library/', $_SERVER['REQUEST_URI'])||preg_match('/\/useful_website/', $_SERVER['REQUEST_URI'])||preg_match('/\/relatednews/', $_SERVER['REQUEST_URI']) ? 'onPage' : ''}}"
             onclick="location.href='/library';">자료실</div>
        <div id="community" class="community grid-item {{ preg_match('/\/articles/', $_SERVER['REQUEST_URI'])||preg_match('/\/fyi/', $_SERVER['REQUEST_URI'])||preg_match('/\/asking/', $_SERVER['REQUEST_URI']) ? 'onPage' : ''}}"
             onclick="location.href='/articles';">커뮤니티</div>
    </div>

    <div id="navbarheader_sub" class="navbarheader_sub">
        <div class="sub_grid">
            <div class="grid-item submenu" onmouseover="highlight('intro')" onmouseout="no_highlight('intro')">
                <div onclick="location.href='{{url('/intro')}}'">
                    회사소개 및 대표인사말
                </div>
                <div onclick="location.href='{{url('/history')}}'">
                    보상원 연혁
                </div>
                <div onclick="location.href='{{url('/location')}}'">
                    회사 위치
                </div>
            </div>
            <div class="grid-item submenu" onmouseover="highlight('notice')" onmouseout="no_highlight('notice')">
                <div onclick="location.href='{{url('/notice_all')}}'">
                   전체 보상 공고/고시
                </div>
                <div onclick="location.href='{{url('/notice')}}'">
                    TODAY 보상 공고/고시
                </div>
            </div>
            <div class="grid-item submenu" onmouseover="highlight('dev_info')" onmouseout="no_highlight('dev_info')">
                <div onclick="location.href='{{url('/dev_info')}}'">
                    개발사업정보
                </div>
            </div>
            <div class="grid-item submenu" onmouseover="highlight('judicial')" onmouseout="no_highlight('judicial')">
                <div onclick="location.href='{{url('/judicial')}}'">
                    유권해석/판례
                </div>
                <div onclick="location.href='{{url('/hotfocus')}}'">
                    HOT 포커스
                </div>
                <div onclick="location.href='{{url('/policy')}}'">
                    규정지침
                </div>
            </div>
            <div class="grid-item submenu" onmouseover="highlight('library')" onmouseout="no_highlight('library')">
                <div onclick="location.href='{{url('/library')}}'">
                    자료실
                </div>
                <div onclick="location.href='{{url('/useful_website')}}'">
                    유용한 사이트
                </div>
                <div onclick="location.href='{{url('/relatednews')}}'">
                    관련 뉴스
                </div>
            </div>
            <div class="grid-item submenu" onmouseover="highlight('community')" onmouseout="no_highlight('community')">
                <div onclick="location.href='{{url('/articles')}}'">
                    자유게시판
                </div>
                <div onclick="location.href='{{url('/asking')}}'">
                    상담 및 설명회 신청
                </div>
                <div onclick="location.href='{{url('/fyi')}}'">
                    공지사항
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function highlight(x){
        document.getElementById(x).style.color="#556fb4";
    }
    function no_highlight(x){
        document.getElementById(x).style.color="black";
    }
</script>