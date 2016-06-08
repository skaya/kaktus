<div class="contact-form">
	<div class="contact-form__inner clearfix">
		<form id="contact-form" class="contact-form__form" name="add_msg" method="post" action="contact.php">
			<span class="required-label contact-form__required-label">*all field are required</span>
			<div class="messages error {if $success==1}success{/if}">
				{section loop=$errors name="m"}
					<div class="message_error">
						{$errors[m]}
					</div>
				{/section}
			</div>

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
				<label for="captcha" class="inline-label">Verification</label>
				<img src="common/captcha.php" class="captcha-img"/>
				<input type="text" class="input-inline input-short" id="captcha" name="captcha" value="{$captcha}"/>
			</div>
			<div class="form-field">
				<input type="submit" class="form-button contact-form__btn"/>
			</div>
		</form>
	</div>
	<div class="contact-form__toggle-link">CONTACT</div>
</div>
