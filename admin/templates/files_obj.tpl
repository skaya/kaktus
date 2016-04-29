<table>
{assign var=me value=$smarty.get.id}
{section loop=$objects name=obj}
{assign var=link_id value=$objects[obj].link_id}
<tr>{assign var=id value=$objects[obj].id}
<td align="center"><a href="#"  onclick="{ajax_update update_id="garmoshka" url="garmoshka.php" function="change_rank" params="part=files_obj&issue_id=$issue_id&id=$me&how=up&page=$page&garmoshka_set_name=$garmoshka_set_name&table=files_to_objects&link_id=$link_id&parent_name=page_id&parent_value=$me"};" target="_self" title="переместить на однупозицию ВВЕРХ" ><img src='admin_img/up.gif' width="5" height="8" hspace="1" vspace="1" align="top"  ></a>

 <a href="#" onclick="{ajax_update update_id="garmoshka" url="garmoshka.php" function="change_rank" params="part=files_obj&issue_id=$issue_id&id=$me&how=down&page=$page&garmoshka_set_name=$garmoshka_set_name&table=files_to_objects&link_id=$link_id&parent_name=page_id&parent_value=$me"};" target="_self"  title="переместить на однупозицию ВНИЗ" ><img src='admin_img/down.gif' width="5" height="8" hspace="0" vspace="0" align="bottom"  style="top:3px; left:-3px; position:relative"></a>
</td>

<td>
<span  id="text_discr{$objects[obj].id}"><span onclick="{ajax_update update_id=text_discr$id function="pic_edit" url="garmoshka.php" params="id=$id&pic_id=$id&table=files"}">{assign var=s value=0}{section loop=$langs name=l}{assign var=field value=name_$langs[l]}{if $s==1}/{/if}{if $objects[obj].$field==''}&mdash;{else}{$objects[obj].$field}{/if}{assign var=s value=1}{/section}</span></span>&nbsp;<a href="../{$objects[obj].file}" target="_blank"><img src="admin_img/open.gif" width="10" height="10" /></a> <a onclick="
javascript:check('файл ', garmoshka,'delete_file','garmoshka.php','to_delete={$objects[obj].id}&id={$me}&part=files_obj&issue_id={$issue_id}&garmoshka_set_name={$garmoshka_set_name}');" title="удалить" ><img src='admin_img/delete_sm.gif' width="9" height="9" ></a>
{assign var=to_delete value=$objects[obj].id}
<a onclick="{ajax_update update_id="garmoshka" function="unlink_file_obj" params="to_delete=$to_delete&id=$me&part=files_obj&issue_id=$issue_id&garmoshka_set_name=$garmoshka_set_name"};" title="удалить" ><img src='admin_img/unlink.gif' width="18" height="13" ></a>

</td>
</tr> 
{/section}
</table>

<form action="upload_file.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process" class="text_discr">Идет загрузка...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_message"></p>
                     <p id="f1_upload_form" align="center"><br/>
                        <input type="hidden" name="issue_id" value="{$issue_id}" />
                         <input type="hidden" name="id" value="{$me}" />
                          <input type="hidden" name="garmoshka_set_name" value="{$garmoshka_set_name}" />
                              <input type="hidden" name="page" value="{if $pages_num==''||$pages_num==0}1{else}{$pages_num}{/if}" />

                         <input type="hidden" name="to_connect" value="object" />
                              <input type="hidden" name="upload_type" value="file" />
                         <label class="text_discr">Название:</label>  <br />
     {section loop=$langs name=l}
 <input type="text" name="name_{$langs[l]}"   size="30" value="" class="text_box" style="background-image:url(admin_img/flags/{$langs[l]}.gif)"/><br />
{/section}
       
<input name="myfile" id="myfile" type="file" size="30" class="browse_form1" />
   
 
                   
                         
                         
                    
                             <input type="submit" name="submitBtn" value="Добавить" class="mini_save"  />
                         
                     </p>
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px;"></iframe>
                 </form>
<div id='link_object'>{$link_object}</div>
<div>{include file="pages_loop.tpl" to_update=objects garmoshka_set_name=$garmoshka_set_name}</div>  
