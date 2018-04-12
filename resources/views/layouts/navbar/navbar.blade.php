<div class="navigationheader">
    <a href="/"><img src=" " title="logo" alt="logo" align="left" style="margin-left: 14vw;"></a>
    <ul>
        @guest
            <li><a href="{{ route('login') }}">로그인</a></li>
            <li><a href="{{ route('register') }}">회원가입</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ \Illuminate\Support\Facades\Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
        <li><a href="">공지사항</a></li>
        <li><a href="">고객센터</a></li>
        <li>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">전체메뉴
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
<div class="navigationmenu">
    <ul>
        <li><a href="">개발사업정보</a></li>
        <li><a href="">자료실</a></li>
        <li><a href="">TODAY 공고/공시</a></li>
        <li><a href="">유권해석&판례</a></li>
        <li><a href="">회사 소개</a></li>
    </ul>
</div>
<div class="searchbarcontainer">
    <div>
        <form action="/action_page.php" style="text-align: center;">
            <input type="search" name="searchbar" style="width:30%;">
            <button type="submit"><img src=""></button>
        </form>
    </div>
    <div>
        <a href=""><p class="navbarotherpage">TODAY 보상 공고/공시</p></a>
        <a href=""><p class="navbarotherpage">보상/용역 대행 컨설팅</p></a>
    </div>
</div>