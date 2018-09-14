<div class="sidebar developmentinfo {{ preg_match('/\/admin\/dev/', $_SERVER['REQUEST_URI']) ||preg_match('/\/admin\/dev.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/adding_charge/', $_SERVER['REQUEST_URI']) ||preg_match('/\/admin\/adding_charge.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/adding_type/', $_SERVER['REQUEST_URI']) ||preg_match('/\/admin\/adding_type.+/', $_SERVER['REQUEST_URI'])? '' : 'hide'}}">
    <div class="sidemenu">개발사업정보</div>
    <div class="sideuser">목록</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector">
                <a href="/admin/dev/">개발사업정보 검색</a>
            </li>
            <li class="selector">
                <a href="/admin/dev/create">개발사업정보 추가</a>
            </li>
            <li class="selector">
                <a href="/admin/adding_type/">유형 목록</a>
            </li>
            <li class="selector">
                <a href="/admin/adding_charge/">주체 목록</a>
            </li>
        </ul>
    </div>
</div>