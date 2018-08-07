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
                {{--<a href="{{url('notice')}}">공고/공시</a>--}}
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
        <div class="intro grid-item {{ $_SERVER['REQUEST_URI'] === '/intro' ? 'onPage' : ''}}"
             onclick="location.href='/intro';">회사소개
        </div>
        <div class="notice grid-item {{ $_SERVER['REQUEST_URI'] === '/notice' ? 'onPage' : ''}}"
             onclick="location.href='/notice';">공고/공시
        </div>
        <div class="dev_info grid-item {{ $_SERVER['REQUEST_URI'] === '/dev_info' ? 'onPage' : ''}}"
             onclick="location.href='/dev_info';">개발사업정보
        </div>
        <div class="judicial grid-item {{ $_SERVER['REQUEST_URI'] === '/judicial' ? 'onPage' : ''}}"
             onclick="location.href='/judicial';">유권해석/ 판례
        </div>
        <div class="library grid-item {{ $_SERVER['REQUEST_URI'] === '/library' ? 'onPage' : ''}}"
             onclick="location.href='/library';">자료실
        </div>
        <div class="community grid-item {{ $_SERVER['REQUEST_URI'] === '/articles' ? 'onPage' : ''}}"
             onclick="location.href='/articles';">커뮤니티
        </div>
    </div>

    <div id="navbarheader_sub" class="navbarheader_sub">
        <div class="sub_grid">
            <div class="grid-item submenu">
                <div onclick="location.href='{{url('/intro')}}'">
                    회사소개 및 대표인사말
                </div>
                <div onclick="location.href='{{url('/history')}}'">
                    보상원 연혁
                </div>
                <div onclick="location.href='{{url('/company_location')}}'">
                    회사 위치
                </div>
            </div>
            <div class="grid-item submenu">
                <div onclick="location.href='{{url('/notice')}}'">
                    공고/공시
                </div>
            </div>
            <div class="grid-item submenu">
                <div onclick="location.href='{{url('/dev_info')}}'">
                    개발사업정보
                </div>
            </div>
            <div class="grid-item submenu">
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
            <div class="grid-item submenu">
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
            <div class="grid-item submenu">
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
