<div class="navigationheader">
    <a href="/"><img src=" " title="logo" alt="logo" align="left" style="margin-left: 14vw;"></a>
    <ul>
        @guest
            <li><a href="{{ route('login') }}">로그인</a></li>
            <li><a href="{{ route('register') }}">회원가입</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                   aria-haspopup="true" v-pre>
                    {{ \Illuminate\Support\Facades\Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('user.logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
        <li><a href="{{url('fyi')}}">공지사항</a></li>
        <li><a href="">고객센터</a></li>
        <li>
            <div class="dropdown">
                <button class="dropbtn menu_btn" type="button">전체메뉴
                    <span class="caret"></span></button>
                <div class="dropdown-content">
                    <a href="{{url('intro')}}">회사소개</a>
                    <a href="{{url('register')}}">회원가입</a>
                    <a href="{{url('login')}}">로그인</a>
                    <a href="{{url('fyi')}}">공지사항</a>
                    <a href="{{url('asking')}}">상담하기</a>
                    <a href="{{url('dev_info')}}">개발사업정보검색</a>
                    <a href="{{url('judicial')}}">유권해석&판례</a>
                    <a href="{{url('notice')}}">공고/ 공시</a>
                    <a href="{{url('hotfocus')}}">HOT 포커스</a>
                    <a href="{{url('relatednews')}}">관련 뉴스</a>
                    <a href="{{url('library')}}">자료실</a>
                    <a href="{{url('articles')}}">커뮤니티</a>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="navigationmenu">
    <ul>
        <li><a href="{{url('intro')}}">회사 소개</a></li>
        <li><a href="{{url('notice')}}">공고/공시</a></li>
        <li><a href="{{url('dev_info')}}">개발사업정보</a></li>
        <li><a href="{{url('judicial')}}">유권해석&판례</a></li>
        <li><a href="{{url('library')}}">자료실</a></li>
        <li><a href="{{url('articles') }}">커뮤니티</a></li>
    </ul>
</div>
