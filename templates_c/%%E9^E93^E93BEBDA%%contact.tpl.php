<?php /* Smarty version 2.6.12, created on 2016-06-06 23:56:29
         compiled from contact.tpl */ ?>
<div id="contactable_inner"></div>
<form id="contactForm" name="add_msg" method="post">

	<div class="holder">


		<input type="hidden" name="action" value="add_msg" />
		<p class="disclaimer">Пожалуйста, заполните все поля для отправки сообщения</p>
			<div class="messages error <?php if ($this->_tpl_vars['send'] == 1): ?>send<?php endif; ?>">
				<?php unset($this->_sections['nn']);
$this->_sections['nn']['loop'] = is_array($_loop=$this->_tpl_vars['errors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['nn']['name'] = 'nn';
$this->_sections['nn']['show'] = true;
$this->_sections['nn']['max'] = $this->_sections['nn']['loop'];
$this->_sections['nn']['step'] = 1;
$this->_sections['nn']['start'] = $this->_sections['nn']['step'] > 0 ? 0 : $this->_sections['nn']['loop']-1;
if ($this->_sections['nn']['show']) {
    $this->_sections['nn']['total'] = $this->_sections['nn']['loop'];
    if ($this->_sections['nn']['total'] == 0)
        $this->_sections['nn']['show'] = false;
} else
    $this->_sections['nn']['total'] = 0;
if ($this->_sections['nn']['show']):

            for ($this->_sections['nn']['index'] = $this->_sections['nn']['start'], $this->_sections['nn']['iteration'] = 1;
                 $this->_sections['nn']['iteration'] <= $this->_sections['nn']['total'];
                 $this->_sections['nn']['index'] += $this->_sections['nn']['step'], $this->_sections['nn']['iteration']++):
$this->_sections['nn']['rownum'] = $this->_sections['nn']['iteration'];
$this->_sections['nn']['index_prev'] = $this->_sections['nn']['index'] - $this->_sections['nn']['step'];
$this->_sections['nn']['index_next'] = $this->_sections['nn']['index'] + $this->_sections['nn']['step'];
$this->_sections['nn']['first']      = ($this->_sections['nn']['iteration'] == 1);
$this->_sections['nn']['last']       = ($this->_sections['nn']['iteration'] == $this->_sections['nn']['total']);
?>
					<div class="message_error">
						<?php echo $this->_tpl_vars['errors'][$this->_sections['nn']['index']]; ?>

					</div>
				<?php endfor; endif; ?>
			</div>

		<p>
			<label for="name">Имя</label>
			<input class="text-input" id="name" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
"/>
		</p>
		<p>
			<label for="email">E-mail</label>
			<input class="text-input" id="email" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
"/>
		</p>
		<p>
			<label for="message">Сообщение</label>
			<textarea class="text-input" id="msg" name="msg" rows="4" cols="30" ><?php echo $this->_tpl_vars['msg']; ?>
</textarea>
		</p>
		<p>
			<label for="kod">Код</label>
			<img src="common/assign.php" id="img-kod"/>
			<input type="text" class="input-kod text-input" id="kod" name="kod" value="<?php echo $this->_tpl_vars['kod']; ?>
"/>
		</p>
		<p>
			<input class="submit" type="submit" value="Отправить"/>
		</p>
	</div>
</form>