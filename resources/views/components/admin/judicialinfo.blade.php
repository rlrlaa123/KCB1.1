<div class="sidebar judicialinfo {{ $_SERVER['REQUEST_URI'] === '/admin/judicial'||$_SERVER['REQUEST_URI'] === '/admin/hotfocus' || $_SERVER['REQUEST_URI'] === '/admin/policy'||$_SERVER['REQUEST_URI'] === '/admin/relatednews' ? '' : 'hide'}}">
    <div class="sidemenu">유권해석 & 판례</div>
    <div class="sideuser">목록</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{ $_SERVER['REQUEST_URI'] === '/admin/judicial' ? 'active' : ''}}"><a href="{{url('admin/judicial')}}">유권해석 & 판례 목록</a></li>
            <li class="selector  {{ $_SERVER['REQUEST_URI'] === '/admin/hotfocus' ? 'active' : ''}}"><a href="{{url('admin/hotfocus')}}">Hot 포커스 목록</a></li>
            <li class="selector  {{ $_SERVER['REQUEST_URI'] === '/admin/policy' ? 'active' : ''}}"><a href="{{url('admin/policy')}}">규정 & 지침 목록</a></li>
            <li class="selector  {{ $_SERVER['REQUEST_URI'] === '/admin/relatednews' ? 'active' : ''}}"><a href="{{url('admin/relatednews')}}">News 목록</a></li>
        </ul>
    </div>
</div>
