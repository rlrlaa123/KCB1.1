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
        <div class="navbardiv grid-item"><a href="{{ url('admin') }}"
                                            id="appname">{{ config('app.name','Laravel') }}</a></div>
        <div id="userdate" class="grid-item">| {{ \Illuminate\Support\Facades\Auth::user()->name }}님 안녕하세요
            / {{ \Carbon\Carbon::now() }}</div>
        <div class="navbardiv grid-item">
            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <div class="navsubbar">
        <div class="grid-item basicinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/basic' ? 'active' : ''}}" style="-ms-grid-column: 1"
        onclick="location.href='/admin/basic';">기초정보
        </div>
        <div class="grid-item  userinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/user' ? 'active' : ''}}" style="-ms-grid-column: 3"
             onclick="location.href='/admin/user';">회원정보
        </div>
        <div class="grid-item developmentinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/dev' ? 'active' : ''}}"
             onclick="location.href='/admin/dev';" style="-ms-grid-column: 5">개발사업정보
        </div>
        <div class="grid-item  judicialinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/judicial' || $_SERVER['REQUEST_URI'] === '/admin/hotfocus'
        ||$_SERVER['REQUEST_URI'] === '/admin/policy' ? 'active' : ''}}"
             onclick="location.href='/admin/judicial';" style="-ms-grid-column: 7">유권해석&판례
        </div>
        <div class="grid-item  noticeinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/notice'|| $_SERVER['REQUEST_URI']==='admin/consulting' ? 'active' : ''}}"
             onclick="location.href='/admin/notice';" style="-ms-grid-column: 9">공고/공시
        </div>
        <div class="grid-item  libraryinfo-selector {{ $_SERVER['REQUEST_URI'] === '/admin/library'||$_SERVER['REQUEST_URI'] === '/admin/relatednews' ? 'active' : ''}}"
             onclick="location.href='/admin/library';" style="-ms-grid-column: 11">자료실
        </div>
        <div class="grid-item communityinfo-selector {{ preg_match('/\/admin\/community.+/' , $_SERVER['REQUEST_URI']) || preg_match('/\/admin\/fyi.+/', $_SERVER['REQUEST_URI']) || preg_match('/\/admin\/asking.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"
             onclick="location.href='/admin/community/';"style="-ms-grid-column: 13">커뮤니티
        </div>
    </div>

    <div class="navlayout">
        <div class="grid-item">
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
        </div>
        <div class="grid-item">
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