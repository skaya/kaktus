<?php /* Smarty version 2.6.12, created on 2015-11-24 01:04:22
         compiled from garmoshka.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'garmoshka.tpl', 7, false),)), $this); ?>
<ul style="" id="garm">
	<?php $this->assign('issue_id', $_GET['issue_id']); ?>
	<?php $this->assign('id', $_GET['id']); ?>
  <?php $_from = $this->_tpl_vars['garmoshka_set']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
		<?php $this->assign('part', $this->_tpl_vars['garmoshka_set'][$this->_tpl_vars['key']]['tpl']); ?>
    <li>
			<input type="button"  class="garm"  value="<?php echo $this->_tpl_vars['item']['name']; ?>
" onclick="<?php echo smarty_function_ajax_update(array('update_id' => 'garmoshka','function' => 'show','url' => "garmoshka.php",'params' => "part=".($this->_tpl_vars['part'])."&issue_id=".($this->_tpl_vars['issue_id'])."&id=".($this->_tpl_vars['id'])."&garmoshka_set_name=".($this->_tpl_vars['garmoshka_set_name'])), $this);?>
">
			<div id="<?php echo $this->_tpl_vars['part']['tpl']; ?>
.tpl" >
				<?php if ($this->_tpl_vars['show_tpl'] == $this->_tpl_vars['item']['tpl']):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['part']).".tpl", 'smarty_include_vars' => array('garmoshka_set_name' => $this->_tpl_vars['garmoshka_set_name'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
			</div>
		</li>
  <?php endforeach; endif; unset($_from); ?>
</ul>