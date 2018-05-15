<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('style')
    @include('layouts.partials.header_admin')
    @include('layouts.partials.admin_style')
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
</head>
<body>
<div id="wrapper">
    <div class="navbar">
        <div class="navbardiv"><a href="{{ url('admin') }}" id="appname">{{ config('app.name','Laravel') }}</a></div>
        <div id="userdate">| {{ \Illuminate\Support\Facades\Auth::user()->name }}님 안녕하세요
            / {{ \Carbon\Carbon::now() }}</div>
        <div class="navbardiv"><a href="{{ route('admin.logout') }}"
                                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" id="logout">
                [ 로그아웃 ]
            </a>
        </div>
    </div>
    <div class="navsubbar">
        <div class="basicinfo-selector {{ preg_match('/\/admin\/basic.+/' , $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/basic/';">기초정보
        </div>
        <div class="userinfo-selector {{ preg_match('/\/admin\/user.+/' , $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/user/';">회원정보
        </div>
        <div class="developmentinfo-selector {{  preg_match('/\/admin\/dev.+/' , $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/dev/';">개발사업정보
        </div>
        <div class="judicialinfo-selector {{ preg_match('/\/admin\/judicial.+/' , $_SERVER['REQUEST_URI'])||  preg_match('/\/admin\/hotfocus.+/' , $_SERVER['REQUEST_URI'])
        || preg_match('/\/admin\/policy.+/' , $_SERVER['REQUEST_URI'])|| preg_match('/\/admin\/relatednews.+/' , $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/judicial/';">유권해석&판례
        </div>
        <div class="noticeinfo-selector {{ preg_match('/\/admin\/notice.+/' , $_SERVER['REQUEST_URI'])|| preg_match('/\/admin\/community.+/' , $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/notice/';">공고/공시
        </div>
        <div class="libraryinfo-selector {{  preg_match('/\/admin\/library.+/' , $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/library/';">자료실
        </div>
        <div class="communityinfo-selector {{ preg_match('/\/admin\/community.+/' , $_SERVER['REQUEST_URI']) || preg_match('/\/admin\/basic.+/', $_SERVER['REQUEST_URI']) || preg_match('/\/admin\/report.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/community/';">커뮤니티
        </div>
    </div>

    <div class="navlayout">
        @component('components.admin.basicinfo')
        @endcomponent
        @component('components.admin.userinfo')
        @endcomponent
        @component('components.admin.developmentinfo')
        @endcomponent
        @component('components.admin.judicialinfo')
        @endcomponent
        @component('components.admin.noticeinfo')
        @endcomponent
        @component('components.admin.libraryinfo')
        @endcomponent
        @component('components.admin.communityinfo')
        @endcomponent
        <div>
            @yield('content')
        </div>
    </div>
</div>
<div class="footer">
    @include('layouts.partials.footer')
</div>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@yield('script')
</body>
</html>