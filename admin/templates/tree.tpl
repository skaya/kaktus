<ul class="sub_menue" id="{$level}">
{section name=foo loop=$a}
	{assign var=id value=$a[foo].id}
	{assign var=parent_id value=$a[foo].parent_id}
	{strip}
		<li {if $a[foo].is_shown==0}class="grey"{/if}  style="border:0;">
			<div>
			  <a href="#"  onclick="{ajax_update update_id="$level" function="change_rank" params="id=$id&how=down"};" target="_self" title="переместить на однупозицию ВНИЗ" ><img src='admin_img/up.gif' width="5" height="8" hspace="2" vspace="2" align="top"  ></a>
			  <a href="#" onclick="{ajax_update update_id="$level" function="change_rank" params="id=$id&how=up"};" target="_self"  title="переместить на однупозицию ВВЕРХ" ><img src='admin_img/down.gif' width="5" height="8" hspace="0" vspace="0" align="bottom"  style="top:3px; left:-3px; position:relative"></a>

			  {if $a[foo].sub==1}
			  	<a href="#" title="Показать вложенные подразделы"><img src='admin_img/{if $a[foo].display=="none"}open{else}close{/if}_level.gif'  width="9" height="9" hspace="4" vspace="4"  class="sub_menue" onClick="toggle_kl(this,'tree_line{$a[foo].id}');{ajax_update update_id="tree_line$id" function="select_subtree" params="id=$id"}; " id="point{$a[foo].id}"></a>
			  {else}
			  	<img src='admin_img/none.gif' width="9" height="9" hspace="4" vspace="4" class="sub_menue" id="point{$a[foo].id}"  >
			  {/if}

			  <a  style="border:0px solid;" href="page.php?issue_id={$a[foo].id}" name="{$a[foo].id}000000" class="text_sub_menue" title="редактировать страницу" id="link{$a[foo].id}">{$a[foo].menue}{if $a[foo].menue==''}(без названия){/if}</a>
		  </div>

		  <div style="float:right; margin-top:-14px;">
			  <a href='#' onClick="add_page({$a[foo].id},'{$a[foo].link}');" target='_self' class="sub_menue" title="добавить подраздел"><img src='admin_img/add.png' width="16" height="16"  ></a>
			  <a href="javascript:check('раздел ', '{$level}','delete_page','index.php','issue_id={$id}');" target="_self"  class="sub_menue" title="удалить раздел со всеми подразделами"  ><img src='admin_img/delete.png'></a>
			</div>


			<div id="tree_line{$id}" style="display:none"></div>
	  </li>
	{/strip}
{/section}
</ul>
