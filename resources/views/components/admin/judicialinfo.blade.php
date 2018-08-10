<div class="sidebar judicialinfo
{{ preg_match('/\/admin\/judicial/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/judicial.+/', $_SERVER['REQUEST_URI'])
|| preg_match('/\/admin\/hotfocus/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/hotfocus.+/', $_SERVER['REQUEST_URI'])
|| preg_match('/\/admin\/policy/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/policy.+/', $_SERVER['REQUEST_URI']) ? '' : 'hide'}}">
    <div class="sidemenu">유권해석 & 판례</div>
    <div class="sideuser">목록</div>
    <div class="sidesubmenu">
        <ul>
            <li class="selector  {{preg_match('/\/admin\/judicial/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/judicial.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/judicial/')}}">유권해석 & 판례 목록</a></li>
            <li class="selector  {{ preg_match('/\/admin\/hotfocus/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/hotfocus.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/hotfocus/')}}">Hot 포커스 목록</a></li>
            <li class="selector  {{ preg_match('/\/admin\/policy/', $_SERVER['REQUEST_URI'])||preg_match('/\/admin\/policy.+/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}">
                <a href="{{url('admin/policy/')}}">규정 & 지침 목록</a></li>

        </ul>
    </div>
</div>
