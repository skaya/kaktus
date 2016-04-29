<?php /* Smarty version 2.6.12, created on 2012-06-22 15:26:56
         compiled from extra.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'extra.tpl', 16, false),)), $this); ?>

<table width="640" align="center" cellpadding="0" cellspacing="0" > 
  <form name="page_templ" action="extras.php" method="post">  
  <input name="action" type="hidden" value="save" />
  <input name="issue_id" type="hidden" value="<?php echo $this->_tpl_vars['pages']['id']; ?>
" />

  <tr>
    <td  align="center"><h1>Редактирование колонтитула <?php echo $this->_tpl_vars['pages']['descr']; ?>
</h1></td>
  </tr>
  <tr>
    <td  align="center">
	<?php if ($this->_tpl_vars['pages']['spaw'] == 1): ?>
		<?php echo $this->_tpl_vars['page_text']; ?>

	<?php else: ?>
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
 $this->assign('field', "text_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
                    	<input type="text" class="text_box5" name="text_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pages'][$this->_tpl_vars['field']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"  style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)" size="300"/>
                        <?php endfor; endif; ?>
	
	<?php endif; ?>	
	</td>
    </tr>
	  <tr>
	    <td align="center"><input name="submitA" type="submit" value="Сохранить"  id="save_but2"/></td>
    </tr>
</form>
    </table>