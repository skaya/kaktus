<?php /* Smarty version 2.6.12, created on 2015-08-13 05:55:35
         compiled from extras.tpl */ ?>

<h1>Колонтитулы</h1>

<center>
<table  border="0" align="center">	

<?php unset($this->_sections['item']);
$this->_sections['item']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['item']['name'] = 'item';
$this->_sections['item']['show'] = true;
$this->_sections['item']['max'] = $this->_sections['item']['loop'];
$this->_sections['item']['step'] = 1;
$this->_sections['item']['start'] = $this->_sections['item']['step'] > 0 ? 0 : $this->_sections['item']['loop']-1;
if ($this->_sections['item']['show']) {
    $this->_sections['item']['total'] = $this->_sections['item']['loop'];
    if ($this->_sections['item']['total'] == 0)
        $this->_sections['item']['show'] = false;
} else
    $this->_sections['item']['total'] = 0;
if ($this->_sections['item']['show']):

            for ($this->_sections['item']['index'] = $this->_sections['item']['start'], $this->_sections['item']['iteration'] = 1;
                 $this->_sections['item']['iteration'] <= $this->_sections['item']['total'];
                 $this->_sections['item']['index'] += $this->_sections['item']['step'], $this->_sections['item']['iteration']++):
$this->_sections['item']['rownum'] = $this->_sections['item']['iteration'];
$this->_sections['item']['index_prev'] = $this->_sections['item']['index'] - $this->_sections['item']['step'];
$this->_sections['item']['index_next'] = $this->_sections['item']['index'] + $this->_sections['item']['step'];
$this->_sections['item']['first']      = ($this->_sections['item']['iteration'] == 1);
$this->_sections['item']['last']       = ($this->_sections['item']['iteration'] == $this->_sections['item']['total']);
?>
<tr>
    <td width="250px"><a href="extras.php?action=edit&amp;issue_id=<?php echo $this->_tpl_vars['list'][$this->_sections['item']['index']]['id']; ?>
" class='text_sub_menue'> <?php echo $this->_tpl_vars['list'][$this->_sections['item']['index']]['descr']; ?>
</a></td>
    <td width="50px">
    <a href="extras.php?action=edit&&issue_id=<?php echo $this->_tpl_vars['list'][$this->_sections['item']['index']]['id']; ?>
" class='text_sub_menue'><img src="admin_img/edit.gif" alt="редактировать" width="16" height="16" /> </a>
    <a href="javascript:check('<?php echo $this->_tpl_vars['cont'][$this->_sections['i']['index']]['fio']; ?>
', 'contact.php?action=delete_cont&issue_id=<?php echo $this->_tpl_vars['cont'][$this->_sections['i']['index']]['id']; ?>
');" target="_self"  class="sub_menue" title="удалить сотрудника"><img src='admin_img/del.png' width="16" height="16"></a>	
    </td>
</tr>
<?php endfor; endif; ?>
</table>
</center>
<?php echo $this->_tpl_vars['content']; ?>

