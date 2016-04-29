<table cellspacing="0" cellspacing="0" border="0"><tr>{assign var=i value=-1}
{section loop=$pics name=pic}{assign var=pic_id value=$pics[pic].id}
{if $i==2}<tr>{assign var=i value=0}{else}{assign var=i value=$i+1}{/if}
<td align="center" valign="top" width="33%">
<div style="background:url(../{$pics[pic].picture_prev}) no-repeat right top;  height:50px; width:50px; text-align:right; padding:0px; border:1px solid #ccc"><a onclick="javascript:check('изображение', 'garmoshka','delete_obj_pic','garmoshka.php','pic_id={$pic_id}&part=pics_obj&id={$id}&garmoshka_set_name={$garmoshka_set_name}');" title="удалить" ><img src='admin_img/delete_sm.gif' width="9" height="9"  vspace="5" hspace="5"></a></div>

<div style="width:50px; margin-top:-25px; margin-bottom:23px; padding:0px">
<nobr><a href="#"  onclick="{ajax_update update_id="garmoshka" url="garmoshka.php" function="change_rank" params="part=pics_obj&issue_id=$issue_id&id=$id&how=up&page=$page&garmoshka_set_name=$garmoshka_set_name&table=obj_pict&link_id=$pic_id&parent_name=obj_id&parent_value=$id"};" target="_self" title="переместить на однупозицию ВВЕРХ" ><img src='admin_img/left.gif' width="10" height="7" hspace="0" vspace="0" align="left" style="margin:0px; padding:0px"   ></a><a href="#" onclick="{ajax_update update_id="garmoshka" url="garmoshka.php" function="change_rank" params="part=pics_obj&issue_id=$issue_id&id=$id&how=down&page=$page&garmoshka_set_name=$garmoshka_set_name&table=obj_pict&link_id=$pic_id&parent_name=obj_id&parent_value=$id"};" target="_self"  title="переместить на однупозицию ВНИЗ" ><img src='admin_img/right.gif' width="10" height="7" hspace="0" vspace="0"  align="right" style="margin:0px; padding:0px" ></a>
</nobr>
</div>


<div class="text_discr"  id="text_discr{$pic_id}"><div onclick="{ajax_update update_id=text_discr$pic_id function="pic_edit" url="garmoshka.php" params="id=$id&pic_id=$pic_id&table=obj_pict"}">{assign var=p value=0}
{section loop=$langs name=l}{assign var=field value=name_$langs[l]}
{if $p==1}/
{/if}{if $pics[pic].$field==''} &mdash; {else}{$pics[pic].$field}{/if}{assign var=p value=1}
{/section}
</div>
</div></td>{if $i==2}</tr>{/if}
{/section}</table>

<div>{include file="pages_loop.tpl" to_update=pics}</div>  
<form action="upload.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process" class="text_discr">Идет загрузка...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_message"></p>
                     <p id="f1_upload_form" align="center"><br/>
                        <input type="hidden" name="id" value="{$id}" />
                          <input type="hidden" name="garmoshka_set_name" value="{$garmoshka_set_name}" />
                              <input type="hidden" name="issue_id" value="{$issue_id}" />
                              <input type="hidden" name="page" value="{if $pages_num==''||$pages_num==0}1{else}{$pages_num}{/if}" />

                         <input type="hidden" name="to_connect" value="object" />
                              <input type="hidden" name="upload_type" value="image" />
                              
                         <label class="text_discr">Название:</label>  <br />
     {section loop=$langs name=l}
 <input type="text" name="name_{$langs[l]}"   size="30" value="" class="text_box" style="background-image:url(admin_img/flags/{$langs[l]}.gif)"/><br />
{/section}
<input name="myfile" id="myfile" type="file" size="30" class="browse_form1" />
                         
                         
                    
                             <input type="submit" name="submitBtn" value="Добавить" class="mini_save"  />
                         
                     </p>
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px;"></iframe>
                 </form>