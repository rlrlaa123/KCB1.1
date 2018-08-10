<style>
    .detailpage_list > div > a {
        cursor: pointer;
        display: inline-block;
        display: -moz-inline-block;
        display: inline;
        padding: 0.7vw;
        font-weight: 700;
        justify-content: left;
        text-align: left;
        font-size: 1vw;
        color:black;
        text-decoration: none;
    }
</style>
<div class="detailpage_list">
    <div class="notice-selector {{ $_SERVER['REQUEST_URI'] === '/notice_all' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/notice_all';">전체 보상 공고/공시
    </div>
    <div class="notice-selector {{ $_SERVER['REQUEST_URI'] === '/notice' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/notice';">TODAY 보상 공고/공시
    </div>
    <div><a href='http://www.courtauction.go.kr/' target="_blank">경매물건 검색하기</a></div>
    <div><a href='http://www.onbid.co.kr/' target="_blank">공매물건 검색하기</a></div>
</div>