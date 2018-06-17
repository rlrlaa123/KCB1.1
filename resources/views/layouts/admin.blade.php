<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @yield('style')
    @include('layouts.partials.header_admin')
    @include('layouts.partials.admin_style')
    {{--<link href="{{ asset('css/NanumSquare-master/nanumsquare.css') }}" rel="Stylesheet">--}}
</head>
<body>
<div id="wrapper">
    <div class="navbar">
        <div class="navbardiv"><a href="{{ url('admin') }}" id="appname">{{ config('app.name','Laravel') }}</a></div>
        <div id="userdate">| {{ \Illuminate\Support\Facades\Auth::user()->name }}님 안녕하세요
            / {{ \Carbon\Carbon::now() }}</div>
        <div class="navbardiv">
            <a href="{{ route('admin.logout') }}" id="logout">
                [ 로그아웃 ]
            </a>
        </div>
    </div>
    <div class="navsubbar">
        {{--<div class="basicinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/basic' ? 'active' : ''}}"--}}
             {{--onclick="location.href='/admin/basic';">기초정보--}}
        {{--</div>--}}
        <div class="userinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/user' ? 'active' : ''}}"
             onclick="location.href='/admin/user';">회원정보
        </div>
        <div class="developmentinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/dev' ? 'active' : ''}}"
             onclick="location.href='/admin/dev';">개발사업정보
        </div>
        <div class="judicialinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/judicial' || $_SERVER['REQUEST_URI'] === '/admin/hotfocus'
        ||$_SERVER['REQUEST_URI'] === '/admin/policy'||$_SERVER['REQUEST_URI'] === '/admin/relatednews' ? 'active' : ''}}"
             onclick="location.href='/admin/judicial';">유권해석&판례
        </div>
        <div class="noticeinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/notice'||$_SERVER['REQUEST_URI']==='admin/fyi'|| $_SERVER['REQUEST_URI']==='admin/consulting' ? 'active' : ''}}"
             onclick="location.href='/admin/notice';">공고/공시
        </div>
        <div class="libraryinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/library' ? 'active' : ''}}"
             onclick="location.href='/admin/library';">자료실
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
@yield('script')
</body>
</html>