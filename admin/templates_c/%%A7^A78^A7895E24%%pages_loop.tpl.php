<?php /* Smarty version 2.6.12, created on 2013-01-20 20:53:09
         compiled from pages_loop.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'pages_loop.tpl', 3, false),)), $this); ?>
<?php if ($this->_tpl_vars['pages_num'] > 1):  $this->assign('issue_id', $_GET['issue_id']);  $this->assign('i', 1); ?>
<?php unset($this->_sections['pages']);
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['pages_num']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = $this->_sections['pages']['loop'];
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
<?php if ($this->_tpl_vars['i'] > 1): ?> |<?php endif; ?> <a href="#" onclick="<?php echo smarty_function_ajax_update(array('update_id' => 'garmoshka','function' => 'show','url' => "garmoshka.php",'params' => "id=".($this->_tpl_vars['id'])."&part=".($this->_tpl_vars['to_update'])."&issue_id=".($this->_tpl_vars['issue_id'])."&page=".($this->_tpl_vars['i'])."&garmoshka_set_name=".($this->_tpl_vars['garmoshka_set_name'])), $this);?>
"><?php echo $this->_tpl_vars['i']; ?>
</a><?php $this->assign('i', $this->_tpl_vars['i']+1); ?>
<?php endfor; endif; ?>
<?php endif; ?>