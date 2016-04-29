<div id="contactable_inner"></div>
<form id="contactForm" name="add_msg" method="post">

	<div class="holder">


		<input type="hidden" name="action" value="add_msg" />
		<p class="disclaimer">Пожалуйста, заполните все поля для отправки сообщения</p>
			<div class="messages error {if $send==1}send{/if}">
				{section loop=$errors name="nn"}
					<div class="message_error">
						{$errors[nn]}
					</div>
				{/section}
			</div>

		<p>
			<label for="name">Имя</label>
			<input class="text-input" id="name" name="name" value="{$name}"/>
		</p>
		<p>
			<label for="email">E-mail</label>
			<input class="text-input" id="email" name="email" value="{$email}"/>
		</p>
		<p>
			<label for="message">Сообщение</label>
			<textarea class="text-input" id="msg" name="msg" rows="4" cols="30" >{$msg}</textarea>
		</p>
		<p>
			<label for="kod">Код</label>
			<img src="common/assign.php" id="img-kod"/>
			<input type="text" class="input-kod text-input" id="kod" name="kod" value="{$kod}"/>
		</p>
		<p>
			<input class="submit" type="submit" value="Отправить"/>
		</p>
	</div>
</form>