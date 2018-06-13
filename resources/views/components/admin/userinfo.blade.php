<div class="sidebar userinfo {{ preg_match('/\/admin\/user.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/user/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/search_user.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/search_user/', $_SERVER['REQUEST_URI'])? '' : 'hide'}}">
    <div class="sidemenu">커뮤니티</div>
    <div class="sideuser">커뮤니티</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/user.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/search_user.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a href="/admin/user/">회원리스트</a></li>
        </ul>
    </div>
</div>