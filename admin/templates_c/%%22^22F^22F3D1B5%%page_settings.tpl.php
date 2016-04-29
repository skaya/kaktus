<?php /* Smarty version 2.6.12, created on 2013-04-29 01:53:19
         compiled from page_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ajax_form', 'page_settings.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('ajax_form', array('method' => 'post','id' => 'page_settings','url' => "check_page_settings.php",'callback' => "me()")); $_block_repeat=true;smarty_block_ajax_form($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<input name="issue_id" type="hidden" value="<?php echo $this->_tpl_vars['data']['id']; ?>
">
<?php $_from = $this->_tpl_vars['parameters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['item']):
?>
<?php $this->assign('t', $this->_tpl_vars['item']['name']); ?>

<div  class="text_discr_big <?php if ($this->_tpl_vars['item']['type'] == 'text'): ?>text<?php endif; ?>"><?php if ($this->_tpl_vars['item']['type'] == 'text'): ?><span><?php echo $this->_tpl_vars['item']['descr']; ?>
</span><?php endif; ?><input name="<?php echo $this->_tpl_vars['item']['name']; ?>
" type="<?php echo $this->_tpl_vars['item']['type']; ?>
" value="<?php if ($this->_tpl_vars['item']['type'] == 'checkbox'): ?>1<?php endif;  if ($this->_tpl_vars['item']['type'] == 'text' && $this->_tpl_vars['data'][$this->_tpl_vars['t']] != 'Array'):  echo $this->_tpl_vars['data'][$this->_tpl_vars['item']['name']];  endif; ?>" <?php if ($this->_tpl_vars['data'][$this->_tpl_vars['t']] == 1): ?>checked="checked"<?php endif; ?> ><?php if ($this->_tpl_vars['item']['type'] != 'text'):  echo $this->_tpl_vars['item']['descr'];  endif; ?></div>

<?php endforeach; endif; unset($_from); ?>

<div  class="text_discr_big"><span>Тип: </span><select name="link">
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
     <option  value="<?php echo $this->_tpl_vars['page_types'][$this->_sections['types']['index']]['link']; ?>
" <?php if ($this->_tpl_vars['data']['link'] == $this->_tpl_vars['page_types'][$this->_sections['types']['index']]['link']): ?>selected="selected"<?php endif; ?> /><?php echo $this->_tpl_vars['page_types'][$this->_sections['types']['index']]['name']; ?>
</option>
     <?php endfor; endif; ?>
</select></div>
<div><input type="submit"  value="сохранить" class="mini_save"/></div>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ajax_form($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>