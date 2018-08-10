<div class="sidebar communityinfo
{{preg_match('/\/admin\/community.+/', $_SERVER['REQUEST_URI'])
|| preg_match('/\/admin\/fyi.+/', $_SERVER['REQUEST_URI'])
||preg_match('/\/admin\/asking.+/', $_SERVER['REQUEST_URI'])
||preg_match('/\/admin\/asking/', $_SERVER['REQUEST_URI'])
||preg_match('/\/admin\/community/', $_SERVER['REQUEST_URI'])
||preg_match('/\/admin\/fyi/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">커뮤니티</div>
    <div class="sideuser">커뮤니티</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ preg_match('/\/admin\/community.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a
                        href="/admin/community/">자유게시판</a></li>
            <li class="selector {{preg_match('/\/admin\/fyi/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/fyi.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/fyi')}}">공지사항</a></li>
            <li class="selector  {{ preg_match('/\/admin\/asking.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}"><a
                        href="/admin/asking/">상담 및 설명회 신청</a></li>
        </ul>
    </div>
</div>