<div id="tree_container"></div>
{include file="tree.tpl" a=$a}

<a  href="#" onClick="add_page(0,'page.php');" target="_self" title="Добавить новый раздел" class="sub_menue">
  <img src='admin_img/add.png' width='16' class="sub_menue" alt="Добавить новый раздел">
  Добавить новый раздел
</a>

<div style="position:absolute; top:80px; left:200px; background-color:#FFF; border:1px solid #999; padding:20px; width:300px; display:none; z-index: 20" id="choose">
  <a href="#" onclick="close_add()"><img src="admin_img/close.gif" width="9" height="9" align="right" /></a>
  <h2 id="tree_message">Идет обновление</h2>
  <form method="post" action="check_form.php" onsubmit="SmartyAjax.submit(this, ''); close_add_page(document.getElementById('form_register_issue_id').value); return false;" id="form_register" enctype="multipart/form-data">
    <input type="hidden" name="issue_id" id="form_register_issue_id" value="" />
	  <h2>Добавление новой страницы / раздела</h2>

    Заголовок <input type="text" name="menue" id="menue" value=""  />
    <ul>
      {section loop=$page_types name=types}
        <li>
          <input name="link" type="radio" value="{$page_types[types].link}" />{$page_types[types].name}
        </li>
      {/section}

      <li><input type="submit" value="Добавить"  /></li>
    </ul>
  </form>
</div>
