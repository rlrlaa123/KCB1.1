<div class="sidebar noticeinfo {{preg_match('/\/admin\/notice/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/notice.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/consulting/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/consulting.+/', $_SERVER['REQUEST_URI'])? '' :'hide'}}">
    <div class="sidemenu">공고/공시</div>
    <div class="sideuser">목록</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{preg_match('/\/admin\/notice/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/notice.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/notice')}}">공고/공시</a></li>
            <li class="selector {{preg_match('/\/admin\/consulting/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/consulting.+/', $_SERVER['REQUEST_URI']) ? 'active': '' }}">
                <a href="{{url('admin/consulting')}}">보상용역대행 컨설팅</a></li>
        </ul>
    </div>
</div>

