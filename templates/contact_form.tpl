<div class="contact-form js--contact-form">
	<div class="contact-form__inner clearfix" id="contact-form-container">
		<form id="contact-form" class="contact-form__form" name="add_msg" method="post" action="contact.php" type="post">
			<span class="required-label contact-form__required-label">*all field are required</span>

			<div class="form-field">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" value="{$name}" class="input-text" />
			</div>
			<div class="form-field">
				<label for="email">E-mail</label>
				<input type="email" id="email" name="email" value="{$email}" class="input-text" />
			</div>
			<div class="form-field">
				<label for="message">Message</label>
				<textarea name="message" id="message" class="input-text">{$message}</textarea>
			</div>
			<div class="form-field">
				<input type="submit" class="form-button contact-form__btn"/>
			</div>
		</form>
	</div>
	<a href="#" class="contact-form__toggle-link js--show-contact-form">CONTACT</a>
</div>
