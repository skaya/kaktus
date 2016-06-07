<?php /* Smarty version 2.6.12, created on 2016-06-07 07:01:27
         compiled from contact_form.tpl */ ?>
<div class="contactForm">
	<div class="contactForm__inner clearfix">
		<form id="contact-form" class="contactForm__form" name="add_msg" method="post" action="contact.php">
			<span class="required-label contactForm__required-label">*all field are required</span>
			<div class="messages error <?php if ($this->_tpl_vars['success'] == 1): ?>success<?php endif; ?>">
				<?php unset($this->_sections['m']);
$this->_sections['m']['loop'] = is_array($_loop=$this->_tpl_vars['errors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['m']['name'] = 'm';
$this->_sections['m']['show'] = true;
$this->_sections['m']['max'] = $this->_sections['m']['loop'];
$this->_sections['m']['step'] = 1;
$this->_sections['m']['start'] = $this->_sections['m']['step'] > 0 ? 0 : $this->_sections['m']['loop']-1;
if ($this->_sections['m']['show']) {
    $this->_sections['m']['total'] = $this->_sections['m']['loop'];
    if ($this->_sections['m']['total'] == 0)
        $this->_sections['m']['show'] = false;
} else
    $this->_sections['m']['total'] = 0;
if ($this->_sections['m']['show']):

            for ($this->_sections['m']['index'] = $this->_sections['m']['start'], $this->_sections['m']['iteration'] = 1;
                 $this->_sections['m']['iteration'] <= $this->_sections['m']['total'];
                 $this->_sections['m']['index'] += $this->_sections['m']['step'], $this->_sections['m']['iteration']++):
$this->_sections['m']['rownum'] = $this->_sections['m']['iteration'];
$this->_sections['m']['index_prev'] = $this->_sections['m']['index'] - $this->_sections['m']['step'];
$this->_sections['m']['index_next'] = $this->_sections['m']['index'] + $this->_sections['m']['step'];
$this->_sections['m']['first']      = ($this->_sections['m']['iteration'] == 1);
$this->_sections['m']['last']       = ($this->_sections['m']['iteration'] == $this->_sections['m']['total']);
?>
					<div class="message_error">
						<?php echo $this->_tpl_vars['errors'][$this->_sections['m']['index']]; ?>

					</div>
				<?php endfor; endif; ?>
			</div>

			<div class="form-field">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
" class="input-text" />
			</div>
			<div class="form-field">
				<label for="email">E-mail</label>
				<input type="email" id="email" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
" class="input-text" />
			</div>
			<div class="form-field">
				<label for="message">Message</label>
				<textarea name="message" id="message" class="input-text"><?php echo $this->_tpl_vars['message']; ?>
</textarea>
			</div>
			<div class="form-field">
				<label for="captcha" class="inline-label">Verification</label>
				<img src="common/captcha.php" class="captcha-img"/>
				<input type="text" class="input-inline input-short" id="captcha" name="captcha" value="<?php echo $this->_tpl_vars['captcha']; ?>
"/>
			</div>
			<div class="form-field">
				<input type="submit" class="form-button contactForm__btn"/>
			</div>
		</form>
	</div>
	<div class="contactForm__toggle-link">CONTACT</div>
</div>