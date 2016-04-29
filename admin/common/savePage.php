<?php
function saveData() {
	global $DB;
	$DB->query("update ?_pages set title_ru=?, menue_ru=?, text_ru=? where id=?", $_POST['title_ru'],$_POST['menue_ru'],$_POST['pagetext'], $_REQUEST['issue_id']);

}

?>