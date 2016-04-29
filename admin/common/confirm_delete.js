function check(message, id, func, url,  params) {
	if (confirm ('Действительно хотите удалить '+ message +'?'))
	{SmartyAjax.update(id, url, 'get', params+'&f='+func); }
}
function me()
{
	alert('Информация обновлена!');
}
function simple_check(message, linkTo) {
	if (confirm ('Действительно хотите удалить '+ message +' ?'))
		location.href = linkTo;
} 