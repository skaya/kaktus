<?

	$top_menue = array();

	if ( !isset($_REQUEST['issue_id']) || $_REQUEST['issue_id'] == '') {
		$_REQUEST['issue_id']=0;
	}
		$level = 10;	//<li style="padding-left:{$level}/>
		$level_step = 10;
		$old_link = -1;
		
		$i=0;
		function select_levels($parent_id,$saved_array,$to_attach)
		{
		global $DB, $db_prefics,$i,$temp_menue;	
		$temp_menue=$DB->select("SELECT ?# as menue,?# as title,parent_id,is_group,id AS ARRAY_KEY,id,link,symlink,is_shown FROM ?_pages WHERE parent_id = '".$parent_id."' and active=1  and is_group!=1  and is_shown=1 ORDER BY rank",get_current_lang('menue'),get_current_lang('title'));

		
		if(is_array($saved_array)>0& count ($saved_array)>0)
		{
			
		$temp_menue[$to_attach]['array']=$saved_array;
		//var_dump($saved_array);
		}
		
		if($parent_id!=0)
		{	$select_id=$DB->selectCell("SELECT parent_id FROM ?_pages WHERE id = ? and active=1 and  is_group!=1 and is_shown=1 ",$parent_id);
			select_levels($select_id,$temp_menue,$parent_id);
		}
		
		return $temp_menue;
		}
		
		$tree=select_levels($_REQUEST['issue_id'],'','');


$smarty->assign('top_menue',$tree);
$smarty->assign('standart_menue',$smarty->fetch('standart_menue.tpl'));
?>