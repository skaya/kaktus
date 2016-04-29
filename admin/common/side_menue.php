<?
//list of menues on page
if (!isset($_REQUEST['issue_id']))
	{$id_side=0;}
else
	{$id_side=$_REQUEST['issue_id'];}


function select_sideblock ($id_side){
	global 	$db_prefics, $DB;
	$query_result = mysql_query("
	SELECT  ".$db_prefics."sideblock.*,".$db_prefics."sideblock_section.rank,".$db_prefics."sideblock_section.position
	FROM ".$db_prefics."sideblock_section
	LEFT JOIN ".$db_prefics."sideblock ON ".$db_prefics."sideblock.id = ".$db_prefics."sideblock_section.sideblock_id
	WHERE ".$db_prefics."sideblock_section.section_id = ".$id_side." ORDER BY ".$db_prefics."sideblock_section.rank", $DB);
	print mysql_error();
	return ($query_result);
}

function getNeiborsS() {
	global 	$db_prefics, $DB;
	$query_result = mysql_query("SELECT rank FROM ".$db_prefics."sideblock_section WHERE section_id=".$_REQUEST['issue_id']." ORDER BY rank", $DB);
	$rank = mysql_fetch_assoc(mysql_query("SELECT rank FROM ".$db_prefics."sideblock_section WHERE sideblock_id=".$_REQUEST['menue']." AND section_id=".$_REQUEST['issue_id'], $DB));
	$neibors['prev'] = $rank['rank'];
	$neibors['next'] = $rank['rank'];  	
	while ( $row = mysql_fetch_assoc($query_result) ) 
		if ( $row['rank'] < $rank['rank'] )
			$neibors['next'] = $row['rank'];			
		else if ( $row['rank'] > $rank['rank'] ) {
			$neibors['prev'] = $row['rank'];
			break;
		}
//	echo "next is:".$neibors['next']."prev is:".$neibors['prev'];
	return $neibors;
}

function replaceItemsS($how) {
	global 	$db_prefics, $DB;
	$neibor = getNeiborsS();
	if ( isset($how) && $how == "next")
		$neibor = $neibor['next'];
	else if ( isset($how) && $how == "prev")
		$neibor = $neibor['prev'];	
	$rank = mysql_fetch_assoc(mysql_query("SELECT rank FROM ".$db_prefics."sideblock_section WHERE section_id=".$_REQUEST['issue_id']." AND sideblock_id=".$_REQUEST['menue'], $DB));
	print mysql_error();
	$rank = $rank['rank'];
	if (isset($neibor) && $neibor != $rank) {		
		mysql_query("UPDATE ".$db_prefics."sideblock_section SET rank=".$rank." WHERE section_id=".$_REQUEST['issue_id']." AND rank=".$neibor, $DB);				
		mysql_query("UPDATE ".$db_prefics."sideblock_section SET rank=".$neibor." WHERE sideblock_id=".$_REQUEST['menue']." AND section_id=".$_REQUEST['issue_id'], $DB);	
		print mysql_error();	
	}
	return $neibor;
}


if ($_REQUEST['action']=="add_menue_left") {
	saveData();
	//set rank as ++max_rank
	$rank = mysql_fetch_assoc( mysql_query(" SELECT MAX(rank) AS rank FROM ".$db_prefics."sideblock_section WHERE section_id =".$_REQUEST['issue_id'], $DB) );
	print mysql_error();	
	if ( !isset($rank) || $rank['rank'] == '') $rank['rank'] = 0;
	mysql_query("INSERT INTO ".$db_prefics."sideblock_section (sideblock_id, section_id,position, rank) VALUES (
			".mysql_escape_string(stripslashes($_REQUEST['men'])).", 
			".mysql_escape_string(stripslashes($_REQUEST['issue_id'])).",
			'left',
			".mysql_escape_string(stripslashes(++$rank['rank'])).")",$DB);	
			print mysql_error();
	header("location:".$_SERVER['PHP_SELF']."?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();	

}
if ($_REQUEST['action']=="add_menue_right") {
	saveData();
	//set rank as ++max_rank
	$rank = mysql_fetch_assoc( mysql_query(" SELECT MAX(rank) AS rank FROM ".$db_prefics."sideblock_section WHERE section_id =".$_REQUEST['issue_id'], $DB) );
	print mysql_error();	
	if ( !isset($rank) || $rank['rank'] == '') $rank['rank'] = 0;
	mysql_query("INSERT INTO ".$db_prefics."sideblock_section (sideblock_id, section_id,position,rank) VALUES (
			".mysql_escape_string(stripslashes($_REQUEST['men_r'])).", 
			".mysql_escape_string(stripslashes($_REQUEST['issue_id'])).",
			'right',
			".mysql_escape_string(stripslashes(++$rank['rank'])).")",$DB);
			print mysql_error();
	header("location:".$_SERVER['PHP_SELF']."?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}
if ($_REQUEST['action']=="delete_menue") {
	saveData();
	mysql_query("DELETE FROM ".$db_prefics."sideblock_section WHERE 
			sideblock_id=".mysql_escape_string(stripslashes($_REQUEST['menue']))." AND
			section_id=".mysql_escape_string(stripslashes($_REQUEST['issue_id'])),$DB);
	print mysql_error();	
	header("location:".$_SERVER['PHP_SELF']."?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}

//change a consequence of the content menu on the selected page/section
if ($_REQUEST['action']=="sideblock_up") {	
	saveData();	
	replaceItemsS("next");
	header("location:".$_SERVER['PHP_SELF']."?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}
if ($_REQUEST['action']=="sideblock_down") {
	saveData();	
	replaceItemsS("prev");
	header("location:".$_SERVER['PHP_SELF']."?action=edit_page&issue_id=".$_REQUEST['issue_id']);	
	exit();
}


	$flash_result=select_sideblock($id_side);

	while ($id_side>0&&mysql_num_rows($flash_result)<=0)
		{
		
		$id_side=mysql_fetch_assoc(mysql_query("SELECT parent_id FROM ".$db_prefics."pages WHERE id=".$id_side));
		$id_side=$id_side['parent_id'];
		$flash_result=select_sideblock ($id_side);
		}


//init left menu correctly
$left_sideblock = array();
$right_sideblock = array();
$temp_array = array();
while ($row = mysql_fetch_assoc($flash_result)):
	array_push( $temp_array, $row['id'] );
	if ($row ['position']=="left")
		{$left_sideblock[] = $row;
			}
	else {$right_sideblock[] = $row;
		}
	$temp_query_result = mysql_query("SELECT * FROM ".$db_prefics."sideblock_content WHERE sideblock_id =".$row['id']." ORDER BY rank", $DB);
	print mysql_error();
	while ($temp_row = mysql_fetch_assoc($temp_query_result)):
		if ( ($temp_row['alias'] == '') || (!isset($temp_row['alias'])) ) {
			$res = mysql_fetch_assoc(mysql_query("SELECT ".$db_prefics."pages.title FROM ".$db_prefics."pages WHERE id =".$temp_row['page_id'], $DB));		
			$temp_row['alias'] = $res['title']; 
			print mysql_error();
		}
		if ($row['position']=="left")
			{$left_sideblock[count($left_sideblock)-1][] = $temp_row;
			}
		else {$right_sideblock[count($right_sideblock)-1][] = $temp_row;
			}
	endwhile;	
endwhile;
$smarty->assign('left_sideblock', $left_sideblock);
$smarty->assign('right_sideblock', $right_sideblock);
	
	
	$query_result = mysql_query("SELECT * FROM ".$db_prefics."sideblock order by title ASC", $DB);
	print mysql_error();
	while($row = mysql_fetch_array($query_result)) {
		if ( in_array( $row['id'], $temp_array ) )
			continue;	
		$mat_array[]=$row;
	};
	$smarty->assign('all_menue',$mat_array);
?>