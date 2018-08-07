<style>
    .companyintro_list_onpage {
        color: #e85254;
    }
    .companyintro_list{
        text-align:left;
    }
    .companyintro_list > div{
        cursor: pointer;
        display: inline-block;
        display: -moz-inline-block;
        display: inline;
        padding: 0.7vw;
        font-weight: 700;
        justify-content: left;
        text-align: left;
        font-size: 1vw;
    }
</style>
<div class="companyintro_list">
    <div class=" {{ $_SERVER['REQUEST_URI'] === '/intro' ? 'companyintro_list_onpage' : ''}}"
         onclick="location.href='/intro';">회사소개 및 대표 인사말
    </div>
    <div class="notice {{ $_SERVER['REQUEST_URI'] === '/history' ? 'companyintro_list_onpage' : ''}}"
         onclick="location.href='/history';">보상원 연혁
    </div>
</div>
