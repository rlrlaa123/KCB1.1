<div class="detailpage_list">
    <div class=" {{ $_SERVER['REQUEST_URI'] === '/library' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/library';">자료실</div>
    <div class="notice {{ $_SERVER['REQUEST_URI'] === '/useful_website' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/useful_website';">유용한 사이트</div>
    <div class="dev_info {{ $_SERVER['REQUEST_URI'] === '/relatednews' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/relatednews';">관련 뉴스
    </div>
</div>