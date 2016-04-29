<?php /* Smarty version 2.6.12, created on 2013-01-20 22:46:59
         compiled from pic_fields_n.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'pic_fields_n.tpl', 2, false),)), $this); ?>
<?php $this->assign('id', $this->_tpl_vars['name']['id']); ?>
<span onclick="<?php echo smarty_function_ajax_update(array('update_id' => "text_discr".($this->_tpl_vars['id']),'function' => 'pic_edit','url' => "garmoshka.php",'params' => "id=".($this->_tpl_vars['id'])."&pic_id=".($this->_tpl_vars['id'])."&table=".($this->_tpl_vars['table'])), $this);?>
">
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
 $this->assign('field', "name_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
<?php if ($this->_tpl_vars['p'] == 1 & $this->_tpl_vars['name'][$this->_tpl_vars['field']] != ''): ?>/
<?php endif;  echo $this->_tpl_vars['name'][$this->_tpl_vars['field']];  $this->assign('p', 1); ?>
<?php endfor; endif; ?>
</span>