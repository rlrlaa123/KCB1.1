<div class="detailpage_list">
    <div class=" {{ $_SERVER['REQUEST_URI'] === '/articles' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/articles';">자유게시판
    </div>
    <div class="{{ $_SERVER['REQUEST_URI'] === '/asking' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/asking';">상담 및 설명회 신청
    </div>
    <div class=" {{ $_SERVER['REQUEST_URI'] === '/fyi' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/fyi';">공지사항
    </div>
</div>