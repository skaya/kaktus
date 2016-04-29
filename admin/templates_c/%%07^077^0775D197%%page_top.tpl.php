<?php /* Smarty version 2.6.12, created on 2015-11-24 01:04:22
         compiled from page_top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'page_top.tpl', 12, false),)), $this); ?>
<div class="top-page-fields">
  <input name="action" type="hidden" value="save_page" />
  <input name="issue_id" type="hidden" value="<?php echo $this->_tpl_vars['pages']['id']; ?>
" />
  <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
  <div class="text_discr" >Пункт меню:</div>
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
 $this->assign('field', "menue_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
  <input type="text"  name="menue_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
" id="menue_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
" size="300" value="<?php echo $this->_tpl_vars['pages'][$this->_tpl_vars['field']]; ?>
" class="text_box5" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)" />
  <?php endfor; endif; ?>
  <div class="text_discr" >Заголовок:</div>
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
  <?php $this->assign('field', "title_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
  <input type="text" class="text_box5" name="title_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
" id="title_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pages'][$this->_tpl_vars['field']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" size="300" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)"/>
  <?php endfor; endif; ?>
</div>
