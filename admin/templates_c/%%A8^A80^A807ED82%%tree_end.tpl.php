<?php /* Smarty version 2.6.12, created on 2015-11-24 01:04:22
         compiled from tree_end.tpl */ ?>
<div id="tree_container"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "tree.tpl", 'smarty_include_vars' => array('a' => $this->_tpl_vars['a'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
      <?php unset($this->_sections['types']);
$this->_sections['types']['loop'] = is_array($_loop=$this->_tpl_vars['page_types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['types']['name'] = 'types';
$this->_sections['types']['show'] = true;
$this->_sections['types']['max'] = $this->_sections['types']['loop'];
$this->_sections['types']['step'] = 1;
$this->_sections['types']['start'] = $this->_sections['types']['step'] > 0 ? 0 : $this->_sections['types']['loop']-1;
if ($this->_sections['types']['show']) {
    $this->_sections['types']['total'] = $this->_sections['types']['loop'];
    if ($this->_sections['types']['total'] == 0)
        $this->_sections['types']['show'] = false;
} else
    $this->_sections['types']['total'] = 0;
if ($this->_sections['types']['show']):

            for ($this->_sections['types']['index'] = $this->_sections['types']['start'], $this->_sections['types']['iteration'] = 1;
                 $this->_sections['types']['iteration'] <= $this->_sections['types']['total'];
                 $this->_sections['types']['index'] += $this->_sections['types']['step'], $this->_sections['types']['iteration']++):
$this->_sections['types']['rownum'] = $this->_sections['types']['iteration'];
$this->_sections['types']['index_prev'] = $this->_sections['types']['index'] - $this->_sections['types']['step'];
$this->_sections['types']['index_next'] = $this->_sections['types']['index'] + $this->_sections['types']['step'];
$this->_sections['types']['first']      = ($this->_sections['types']['iteration'] == 1);
$this->_sections['types']['last']       = ($this->_sections['types']['iteration'] == $this->_sections['types']['total']);
?>
        <li>
          <input name="link" type="radio" value="<?php echo $this->_tpl_vars['page_types'][$this->_sections['types']['index']]['link']; ?>
" /><?php echo $this->_tpl_vars['page_types'][$this->_sections['types']['index']]['name']; ?>

        </li>
      <?php endfor; endif; ?>

      <li><input type="submit" value="Добавить"  /></li>
    </ul>
  </form>
</div>