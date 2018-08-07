<style>

</style>
<div class="judicialpage_list">
    <div class=" {{ $_SERVER['REQUEST_URI'] === '/judicial' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/judicial';">유권해석/판례
    </div>
    <div class="notice {{ $_SERVER['REQUEST_URI'] === '/hotfocus' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/hotfocus';">HOT 포커스
    </div>
    <div class="dev_info {{ $_SERVER['REQUEST_URI'] === '/policy' ? 'judicialpage_list_onpage' : ''}}"
         onclick="location.href='/policy';">규정지침
    </div>
</div>
