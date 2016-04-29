<?
function GetChild($id) {
		global $DB;
		global $db_prefics;
		global $kol;
		global $nom;
		global $smarty;
		global $points;
	   	$a = array();
		$rst = mysql_query("SELECT id,title,menue ,link,parent_id FROM ".$db_prefics."pages WHERE parent_id='".$id."' and is_shown=1 order by rank", $DB);
		print mysql_error();
		if($id==0)
		{$width=100/mysql_num_rows($rst);
		$smarty->assign('width',$width);
		}

		//$level++;
		while ($line = mysql_fetch_assoc($rst)){
		  $g=GetChild($line['id']);
		/*
			if (in_array ($line['id'], $points))
			{$line['class']="sel";}  */
		  array_push($a, array("id"=>$line['id'],"menue"=>$line['menue'],"link"=>$line['link'],"parent_id"=>$line['parent_id'],"class"=>$line['class'],"array"=>$g));}

    	return $a;
    }
?>