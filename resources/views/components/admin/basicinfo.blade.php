<div class="sidebar basicinfo-selector {{ preg_match('/\/admin\/basic/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/basic.+/', $_SERVER['REQUEST_URI'])|| preg_match('/\/admin\/resetPassword/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/resetPassword.+/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">기초정보</div>
    <div class="sideuser">관리자</div>
    <div class="sidesubmenu">
        <ul>
            {{--<li class="liactive"> 사이트정보</li>--}}
            <li class="selector  {{ preg_match('/\/admin\/basic.+/', $_SERVER['REQUEST_URI'])|| preg_match('/\/admin\/resetPassword.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a
                        href="/admin/basic/">관리자정보</a></li>
            {{--<li> 입금계좌</li>--}}
            {{--<li> 사이트정책</li>--}}
        </ul>
    </div>
</div>