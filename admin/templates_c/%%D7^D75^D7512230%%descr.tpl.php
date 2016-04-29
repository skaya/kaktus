<?php /* Smarty version 2.6.12, created on 2013-04-29 00:20:50
         compiled from descr.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ajax_form', 'descr.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('ajax_form', array('method' => 'post','id' => 'form_descr','url' => "check_descr.php",'callback' => "me()")); $_block_repeat=true;smarty_block_ajax_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<input type="hidden" name="issue_id" value="<?php echo $this->_tpl_vars['data']['id']; ?>
" />
<div class="text_discr" >Описание: </div>
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
<?php $this->assign('field', "meta_descr_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
<textarea name="meta_descr_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"  class="text_form" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)">
<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['field']]; ?>
</textarea>
<?php endfor; endif; ?>

<div class="text_discr" >Ключевые слова: </div>
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
 $this->assign('field', "keywords_".($this->_tpl_vars['langs'][$this->_sections['l']['index']])); ?>
<textarea name="keywords_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"  class="text_form" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)">
<?php echo $this->_tpl_vars['data'][$this->_tpl_vars['field']]; ?>
</textarea>
<?php endfor; endif; ?>
                <div><input type="submit"  value="Cохранить" class="mini_save" /></div> 

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ajax_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>