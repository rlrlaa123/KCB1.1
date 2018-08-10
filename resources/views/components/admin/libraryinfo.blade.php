<div class="sidebar libraryinfo
{{ preg_match('/\/admin\/library/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/library.+/', $_SERVER['REQUEST_URI'])
|| preg_match('/\/admin\/relatednews/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/relatednews.+/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">자료실</div>
    <div class="sideuser">목록</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector {{preg_match('/\/admin\/library/', $_SERVER['REQUEST_URI'])
            ||preg_match('/\/admin\/library.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/library/')}}">자료실</a></li>
            <li class="selector  {{ preg_match('/\/admin\/relatednews/', $_SERVER['REQUEST_URI'])
            ||preg_match('/\/admin\/relatednews.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/relatednews/')}}">News 목록</a></li>
        </ul>
    </div>
</div>
