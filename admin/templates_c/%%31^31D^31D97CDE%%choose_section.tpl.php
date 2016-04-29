<?php /* Smarty version 2.6.12, created on 2011-11-24 05:25:31
         compiled from choose_section.tpl */ ?>
<html>
<head>
<title>Сделать подразделом</title>
<link href="common/style.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>Перемещение вниз по иерархии
</h1>
<form action="hie_down.php" method="post" name="save" enctype="multipart/form-data">
<input type="hidden" name="action" value="save">
<input type="hidden" name="issue_id" value="<?php echo $this->_tpl_vars['id']; ?>
">
Выберите подраздел для раздела <strong><?php echo $this->_tpl_vars['title']; ?>
</strong>
<select name="parent_id">
<?php unset($this->_sections['s']);
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['section']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
                        
<option value="<?php echo $this->_tpl_vars['section'][$this->_sections['s']['index']]['id']; ?>
"><?php $this->assign('s', 0);  unset($this->_sections['l']);
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
 $this->assign('field', "menue_".($this->_tpl_vars['langs'][$this->_sections['l']['index']]));  if ($this->_tpl_vars['s'] == 1): ?>/<?php endif;  if ($this->_tpl_vars['section'][$this->_sections['s']['index']][$this->_tpl_vars['field']] == ''): ?>&mdash;<?php else:  echo $this->_tpl_vars['section'][$this->_sections['s']['index']][$this->_tpl_vars['field']];  endif;  $this->assign('s', 1);  endfor; endif; ?></option>
<?php endfor; endif; ?>
</select>
<input type="submit" value="Cохранить">
</form>

</body>

</html>