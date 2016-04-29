<?php /* Smarty version 2.6.12, created on 2013-01-22 01:21:12
         compiled from pic_fields.tpl */ ?>
<form name="edit_pic" id="edit_pic" method="post" enctype="multipart/form-data" target="upload_target" >
  <input type="hidden" name="garmoshka_set_name" value="<?php echo $this->_tpl_vars['garmoshka_set_name']; ?>
" />
  <input type="hidden" name="issue_id" value="<?php echo $this->_tpl_vars['issue_id']; ?>
" />
  <input type="hidden" name="page" value="<?php if ($this->_tpl_vars['pages_num'] == '' || $this->_tpl_vars['pages_num'] == 0): ?>1<?php else:  echo $this->_tpl_vars['pages_num'];  endif; ?>" />
  <input type="hidden" name="pic_id" value="<?php echo $this->_tpl_vars['name']['id']; ?>
" />
  <input type="hidden" name="upload_type" value="image" />

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
		<?php $this->assign('field', "name_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
		<input type="text" name="<?php echo $this->_tpl_vars['name']['id']; ?>
name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"  id="<?php echo $this->_tpl_vars['name']['id']; ?>
name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
" size="30" value="<?php echo $this->_tpl_vars['name'][$this->_tpl_vars['field']]; ?>
" class="text_box" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)"/>
	<?php endfor; endif; ?>

	<input type="button" name="submitBtn" value="Обновить" class="mini_save" onclick="SmartyAjax.update('text_discr<?php echo $this->_tpl_vars['name']['id']; ?>
', 'garmoshka.php', 'get', 'part=pics&issue_id=<?php echo $this->_tpl_vars['issue_id']; ?>
&id=<?php echo $this->_tpl_vars['name']['id']; ?>
&garmoshka_set_name=page&table=<?php echo $this->_tpl_vars['table']; ?>
&pic_id=<?php echo $this->_tpl_vars['name']['id']; ?>
'+<?php unset($this->_sections['l']);
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
 $this->assign('field', "name_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>'&name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
='+document.getElementById('<?php echo $this->_tpl_vars['name']['id']; ?>
name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
').value+<?php endfor; endif; ?>'&f=save_pic_name'); " />
</form >