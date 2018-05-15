<div class="sidebar communityinfo {{ preg_match('/\/admin\/community.+/', $_SERVER['REQUEST_URI'])|| preg_match('/\/admin\/articles.+/', $_SERVER['REQUEST_URI']) || preg_match('/\/admin\/report.+/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/asking.+/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">커뮤니티</div>
    <div class="sideuser">커뮤니티</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/community.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a href="{{url('/admin/community/')}}">자유게시판</a></li>
            <li class="selector  {{ preg_match('/\/admin\/report.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a href="{{url('/admin/report/')}}">신고하기</a></li>
            <li class="selector  {{ preg_match('/\/admin\/asking.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a href="{{url('/admin/asking/')}}">상담하기</a></li>
        </ul>
    </div>
</div>