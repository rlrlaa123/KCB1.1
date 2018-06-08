<div class="sidebar developmentinfo {{ preg_match('/\/admin\/dev/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">개발사업정보</div>
    <div class="sideuser">개발사업정보</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector   {{ preg_match('/\/admin\/dev.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="/admin/dev/">개발사업정보 검색</a></li>
        </ul>
    </div>
</div>