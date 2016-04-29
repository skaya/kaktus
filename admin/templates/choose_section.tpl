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
<input type="hidden" name="issue_id" value="{$id}">
Выберите подраздел для раздела <strong>{$title}</strong>
<select name="parent_id">
{section loop=$section name=s}
                        
<option value="{$section[s].id}">{assign var=s value=0}{section loop=$langs name=l}{assign var=field value=menue_$langs[l]}{if $s==1}/{/if}{if $section[s].$field==''}&mdash;{else}{$section[s].$field}{/if}{assign var=s value=1}{/section}</option>
{/section}
</select>
<input type="submit" value="Cохранить">
</form>

</body>

</html>