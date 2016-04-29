<?php /* Smarty version 2.6.12, created on 2015-11-24 01:04:22
         compiled from tree.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'tree.tpl', 8, false),)), $this); ?>
﻿<ul class="sub_menue" id="<?php echo $this->_tpl_vars['level']; ?>
">
<?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['a']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['step'] = 1;
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = $this->_sections['foo']['loop'];
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
	<?php $this->assign('id', $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id']); ?>
	<?php $this->assign('parent_id', $this->_tpl_vars['a'][$this->_sections['foo']['index']]['parent_id']); ?>
	<?php echo '<li ';  if ($this->_tpl_vars['a'][$this->_sections['foo']['index']]['is_shown'] == 0):  echo 'class="grey"';  endif;  echo '  style="border:0;"><div><a href="#"  onclick="';  echo smarty_function_ajax_update(array('update_id' => ($this->_tpl_vars['level']),'function' => 'change_rank','params' => "id=".($this->_tpl_vars['id'])."&how=down"), $this); echo ';" target="_self" title="переместить на однупозицию ВНИЗ" ><img src=\'admin_img/up.gif\' width="5" height="8" hspace="2" vspace="2" align="top"  ></a><a href="#" onclick="';  echo smarty_function_ajax_update(array('update_id' => ($this->_tpl_vars['level']),'function' => 'change_rank','params' => "id=".($this->_tpl_vars['id'])."&how=up"), $this); echo ';" target="_self"  title="переместить на однупозицию ВВЕРХ" ><img src=\'admin_img/down.gif\' width="5" height="8" hspace="0" vspace="0" align="bottom"  style="top:3px; left:-3px; position:relative"></a>';  if ($this->_tpl_vars['a'][$this->_sections['foo']['index']]['sub'] == 1):  echo '<a href="#" title="Показать вложенные подразделы"><img src=\'admin_img/';  if ($this->_tpl_vars['a'][$this->_sections['foo']['index']]['display'] == 'none'):  echo 'open';  else:  echo 'close';  endif;  echo '_level.gif\'  width="9" height="9" hspace="4" vspace="4"  class="sub_menue" onClick="toggle_kl(this,\'tree_line';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo '\');';  echo smarty_function_ajax_update(array('update_id' => "tree_line".($this->_tpl_vars['id']),'function' => 'select_subtree','params' => "id=".($this->_tpl_vars['id'])), $this); echo '; " id="point';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo '"></a>';  else:  echo '<img src=\'admin_img/none.gif\' width="9" height="9" hspace="4" vspace="4" class="sub_menue" id="point';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo '"  >';  endif;  echo '<a  style="border:0px solid;" href="page.php?issue_id=';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo '" name="';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo '000000" class="text_sub_menue" title="редактировать страницу" id="link';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo '">';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['menue'];  echo '';  if ($this->_tpl_vars['a'][$this->_sections['foo']['index']]['menue'] == ''):  echo '(без названия)';  endif;  echo '</a></div><div style="float:right; margin-top:-14px;"><a href=\'#\' onClick="add_page(';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['id'];  echo ',\'';  echo $this->_tpl_vars['a'][$this->_sections['foo']['index']]['link'];  echo '\');" target=\'_self\' class="sub_menue" title="добавить подраздел"><img src=\'admin_img/add.png\' width="16" height="16"  ></a><a href="javascript:check(\'раздел \', \'';  echo $this->_tpl_vars['level'];  echo '\',\'delete_page\',\'index.php\',\'issue_id=';  echo $this->_tpl_vars['id'];  echo '\');" target="_self"  class="sub_menue" title="удалить раздел со всеми подразделами"  ><img src=\'admin_img/delete.png\'></a></div><div id="tree_line';  echo $this->_tpl_vars['id'];  echo '" style="display:none"></div></li>'; ?>

<?php endfor; endif; ?>
</ul>