<div class="sidebar noticeinfo {{ $_SERVER['REQUEST_URI'] === '/admin/notice' || $_SERVER['REQUEST_URI'] === '/admin/fyi' ? '' :'hide'}}">
    <div class="sidemenu">공고/공시</div>
    <div class="sideuser">목록</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ $_SERVER['REQUEST_URI'] === '/admin/notice' ? 'active' : ''}}"><a href="{{url('admin/notice')}}">공고/공시</a></li>
            <li class="selector {{ $_SERVER['REQUEST_URI'] === '/admin/fyi' ? 'active' : ''}}"><a href="{{url('admin/fyi')}}">공지사항</a></li>
        </ul>
    </div>
</div>
