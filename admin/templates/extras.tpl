
<h1>Колонтитулы</h1>

<center>
<table  border="0" align="center">	

{section loop=$list name=item}
<tr>
    <td width="250px"><a href="extras.php?action=edit&amp;issue_id={$list[item].id}" class='text_sub_menue'> {$list[item].descr}</a></td>
    <td width="50px">
    <a href="extras.php?action=edit&&issue_id={$list[item].id}" class='text_sub_menue'><img src="admin_img/edit.gif" alt="редактировать" width="16" height="16" /> </a>
    <a href="javascript:check('{$cont[i].fio}', 'contact.php?action=delete_cont&issue_id={$cont[i].id}');" target="_self"  class="sub_menue" title="удалить сотрудника"><img src='admin_img/del.png' width="16" height="16"></a>	
    </td>
</tr>
{/section}
</table>
</center>
{$content}

