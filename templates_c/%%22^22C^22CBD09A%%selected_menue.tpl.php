<?php /* Smarty version 2.6.12, created on 2015-11-24 01:02:57
         compiled from selected_menue.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'selected_menue.tpl', 6, false),)), $this); ?>
<?php echo '<div id="navigation-block"><ul id="sliding-navigation">';  unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=$this->_tpl_vars['selected_menue']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
 echo '<li class="sliding-element ';  if ($this->_tpl_vars['selected_menue'][$this->_sections['foo']['index']]['id'] == $this->_tpl_vars['page']['id']):  echo 'select';  endif;  echo '"><div><a href="';  echo ((is_array($_tmp=$this->_tpl_vars['selected_menue'][$this->_sections['foo']['index']]['link'])) ? $this->_run_mod_handler('replace', true, $_tmp, ".php", "") : smarty_modifier_replace($_tmp, ".php", ""));  echo '-';  echo $this->_tpl_vars['selected_menue'][$this->_sections['foo']['index']]['id'];  echo '-';  echo $this->_tpl_vars['lang'];  echo '.html" id="';  echo $this->_tpl_vars['selected_menue'][$this->_sections['foo']['index']]['id'];  echo '" id="';  echo $this->_tpl_vars['selected_menue'][$this->_sections['foo']['index']]['id'];  echo '">';  echo $this->_tpl_vars['selected_menue'][$this->_sections['foo']['index']]['menue'];  echo '</a></div></li>';  endfor; endif;  echo '</ul></div>'; ?>