<?php
global $month;
$month = array('01'=>'янв', '02'=>'фев', '03'=>'мар', '04'=>'апр', '05'=>'май', '06'=>'июн',
			   '07'=>'июл', '08'=>'авг', '09'=>'сен', '10'=>'окт', '11'=>'ноя', '12'=>'дек');

function getNorm_date($date) {
	global $month;
	$date = mb_substr($date, 8, 2)." ".$month[mb_substr($date, 5, 2)]." ".mb_substr($date, 0, 4);
	return $date;
}

function getDB_date($date) {	
	global $month;

	$date = mb_substr($date, 7, 4, 'utf8')."-".array_search(mb_substr($date, 3, 3, 'utf8'), $month)."-".mb_substr($date, 0, 2, 'utf8');	
	return $date;	
} 

?>