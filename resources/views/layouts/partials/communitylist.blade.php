<div class="detailpage_list">
    <div class=" {{ $_SERVER['REQUEST_URI'] === '/articles' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/articles';">신고하기
    </div>
    <div class="notice {{ $_SERVER['REQUEST_URI'] === '/report' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/report';">신고하기
    </div>
    <div class="dev_info {{ $_SERVER['REQUEST_URI'] === '/asking' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/asking';">상담하기
    </div>
</div>