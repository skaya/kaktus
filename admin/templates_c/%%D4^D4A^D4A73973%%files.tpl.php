<?php /* Smarty version 2.6.12, created on 2013-01-20 20:53:09
         compiled from files.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'files.tpl', 6, false),)), $this); ?>
<table>
<?php $this->assign('issue_id', $_GET['issue_id']); ?>
<?php unset($this->_sections['obj']);
$this->_sections['obj']['loop'] = is_array($_loop=$this->_tpl_vars['objects']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['obj']['name'] = 'obj';
$this->_sections['obj']['show'] = true;
$this->_sections['obj']['max'] = $this->_sections['obj']['loop'];
$this->_sections['obj']['step'] = 1;
$this->_sections['obj']['start'] = $this->_sections['obj']['step'] > 0 ? 0 : $this->_sections['obj']['loop']-1;
if ($this->_sections['obj']['show']) {
    $this->_sections['obj']['total'] = $this->_sections['obj']['loop'];
    if ($this->_sections['obj']['total'] == 0)
        $this->_sections['obj']['show'] = false;
} else
    $this->_sections['obj']['total'] = 0;
if ($this->_sections['obj']['show']):

            for ($this->_sections['obj']['index'] = $this->_sections['obj']['start'], $this->_sections['obj']['iteration'] = 1;
                 $this->_sections['obj']['iteration'] <= $this->_sections['obj']['total'];
                 $this->_sections['obj']['index'] += $this->_sections['obj']['step'], $this->_sections['obj']['iteration']++):
$this->_sections['obj']['rownum'] = $this->_sections['obj']['iteration'];
$this->_sections['obj']['index_prev'] = $this->_sections['obj']['index'] - $this->_sections['obj']['step'];
$this->_sections['obj']['index_next'] = $this->_sections['obj']['index'] + $this->_sections['obj']['step'];
$this->_sections['obj']['first']      = ($this->_sections['obj']['iteration'] == 1);
$this->_sections['obj']['last']       = ($this->_sections['obj']['iteration'] == $this->_sections['obj']['total']);
?>
<tr><?php $this->assign('id', $this->_tpl_vars['objects'][$this->_sections['obj']['index']]['id']); ?>
<?php $this->assign('link_id', $this->_tpl_vars['objects'][$this->_sections['obj']['index']]['link_id']); ?>
<td align="center"><a href="#"  onclick="<?php echo smarty_function_ajax_update(array('update_id' => 'garmoshka','url' => "garmoshka.php",'function' => 'change_rank','params' => "part=files&issue_id=".($this->_tpl_vars['issue_id'])."&id=".($this->_tpl_vars['id'])."&how=up&page=".($this->_tpl_vars['page'])."&garmoshka_set_name=".($this->_tpl_vars['garmoshka_set_name'])."&table=files_to_pages&link_id=".($this->_tpl_vars['link_id'])."&parent_name=page_id&parent_value=".($this->_tpl_vars['issue_id'])), $this);?>
;" target="_self" title="переместить на однупозицию ВВЕРХ" ><img src='admin_img/up.gif' width="5" height="8" hspace="1" vspace="1" align="top"  ></a>

 <a href="#" onclick="<?php echo smarty_function_ajax_update(array('update_id' => 'garmoshka','url' => "garmoshka.php",'function' => 'change_rank','params' => "part=files&issue_id=".($this->_tpl_vars['issue_id'])."&id=".($this->_tpl_vars['id'])."&how=down&page=".($this->_tpl_vars['page'])."&garmoshka_set_name=".($this->_tpl_vars['garmoshka_set_name'])."&table=files_to_pages&link_id=".($this->_tpl_vars['link_id'])."&parent_name=page_id&parent_value=".($this->_tpl_vars['issue_id'])), $this);?>
;" target="_self"  title="переместить на однупозицию ВНИЗ" ><img src='admin_img/down.gif' width="5" height="8" hspace="0" vspace="0" align="bottom"  style="top:3px; left:-3px; position:relative"></a>
</td>

<td>
<span  id="text_discr<?php echo $this->_tpl_vars['objects'][$this->_sections['obj']['index']]['id']; ?>
"><span onclick="<?php echo smarty_function_ajax_update(array('update_id' => "text_discr".($this->_tpl_vars['id']),'function' => 'pic_edit','url' => "garmoshka.php",'params' => "id=".($this->_tpl_vars['id'])."&pic_id=".($this->_tpl_vars['id'])."&table=files"), $this);?>
"><?php $this->assign('s', 0);  unset($this->_sections['l']);
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
 $this->assign('field', "name_".($this->_tpl_vars['langs'][$this->_sections['l']['index']]));  if ($this->_tpl_vars['s'] == 1): ?>/<?php endif;  if ($this->_tpl_vars['objects'][$this->_sections['obj']['index']][$this->_tpl_vars['field']] == ''): ?>&mdash;<?php else:  echo $this->_tpl_vars['objects'][$this->_sections['obj']['index']][$this->_tpl_vars['field']];  endif;  $this->assign('s', 1);  endfor; endif; ?></span></span>&nbsp;<a href="../<?php echo $this->_tpl_vars['objects'][$this->_sections['obj']['index']]['file']; ?>
" target="_blank"><img src="admin_img/open.gif" width="10" height="10" /></a> <a onclick="
javascript:check('объект ' +'<?php echo $this->_tpl_vars['objects'][$this->_sections['obj']['index']]['name']; ?>
', garmoshka,'delete_file','garmoshka.php','to_delete=<?php echo $this->_tpl_vars['objects'][$this->_sections['obj']['index']]['id']; ?>
&part=files&issue_id=<?php echo $this->_tpl_vars['issue_id']; ?>
&garmoshka_set_name=<?php echo $this->_tpl_vars['garmoshka_set_name']; ?>
');" title="удалить" ><img src='admin_img/delete_sm.gif' width="9" height="9" ></a>
<a onclick="<?php echo smarty_function_ajax_update(array('update_id' => 'garmoshka','function' => 'unlink_file','params' => "link_to=".($this->_tpl_vars['issue_id'])."&id=".($this->_tpl_vars['id'])."&part=files&issue_id=".($this->_tpl_vars['issue_id'])."&garmoshka_set_name=".($this->_tpl_vars['garmoshka_set_name'])), $this);?>
;" title="удалить" ><img src='admin_img/unlink.gif' width="18" height="13" ></a>
</td>
</tr> 
<?php endfor; endif; ?>
</table>

<form action="upload_file.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
                     <p id="f1_upload_process" class="text_discr">Идет загрузка...<br/><img src="loader.gif" /><br/></p>
                     <p id="f1_upload_message"></p>
                     <p id="f1_upload_form" align="center"><br/>
                        <input type="hidden" name="issue_id" value="<?php echo $_GET['issue_id']; ?>
" />
                          <input type="hidden" name="garmoshka_set_name" value="<?php echo $this->_tpl_vars['garmoshka_set_name']; ?>
" />
                              <input type="hidden" name="page" value="<?php if ($this->_tpl_vars['pages_num'] == '' || $this->_tpl_vars['pages_num'] == 0): ?>1<?php else:  echo $this->_tpl_vars['pages_num'];  endif; ?>" />

                         <input type="hidden" name="to_connect" value="page" />
                              <input type="hidden" name="upload_type" value="file" />
                         <label class="text_discr">Название:</label>  <br />
     <?php unset($this->_sections['l']);
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
 <input type="text" name="name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"   size="30" value="" class="text_box" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)"/><br />
<?php endfor; endif; ?>
       
<input name="myfile" id="myfile" type="file" size="30" class="browse_form1" />
   
 
                   
                         
                         
                    
                             <input type="submit" name="submitBtn" value="Добавить" class="mini_save"  />
                         
                     </p>
                     
                     <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px;"></iframe>
                 </form>
<div id='link_object'><?php echo $this->_tpl_vars['link_object']; ?>
</div>
<div><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pages_loop.tpl", 'smarty_include_vars' => array('to_update' => 'objects','garmoshka_set_name' => $this->_tpl_vars['garmoshka_set_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>  