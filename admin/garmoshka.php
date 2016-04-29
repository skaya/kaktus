<?
require("common/connect_templates.php");

/*--ajaxed part--*/
function show() {
	global $smarty,$garmoshka_set,$admin;
	$smarty->assign('issue_id',$_GET['issue_id']);
	if($_GET['garmoshka_set_name']=="object") {
		$smarty->assign('id',$_GET['id']);
		$_GET['part']($_GET['id']);//если работаем с объектами, то обрабатываем id
	} else{
		$_GET['part']($_GET['issue_id']);//если работаем со всем остальным, то обрабатываем issue_id
	}
	$smarty->assign('show_tpl',$_GET['part']);
	$smarty->assign('garmoshka_set',$garmoshka_set[$_GET['garmoshka_set_name']]);
	$smarty->assign('garmoshka_set_name',$_GET['garmoshka_set_name']);
	$smarty->display('garmoshka.tpl');
}

function change_rank() {
	global $smarty,  $DB;
	$me =$DB->selectRow("SELECT rank,id FROM ?_".$_GET['table']." WHERE id=?",$_GET['link_id']);

	if ( isset($_GET['how']) && $_GET['how'] == "up" ) {
		$neibor=$DB->selectRow("SELECT rank,id FROM ?_".$_GET['table']." WHERE ".$_GET['parent_name']."=".$_GET['parent_value']." and rank<".$me['rank']." ORDER BY rank desc limit 1");
	} else if ( isset($_GET['how']) && $_GET['how'] == "down") {
		$neibor=$DB->selectRow("SELECT rank,id FROM ?_".$_GET['table']." WHERE ".$_GET['parent_name']."=".$_GET['parent_value']." and rank>".$me['rank']." ORDER BY rank asc limit 1");
	}

	if (isset($neibor)&&isset($neibor['rank'])&&isset($me['rank']) && ($neibor['rank'] != $me['rank'])) {
		$DB->query("UPDATE ?_".$_GET['table']." SET rank=".$neibor['rank']." WHERE id = ".$me['id']);
		$DB->query("UPDATE  ?_".$_GET['table']." SET rank=".$me['rank']." WHERE id = ".$neibor['id']);
	}

	$smarty->assign('issue_id',$_GET['issue_id']);

	show();//отображаем измененный список
}

function delete_pic() {
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow(
	"SELECT * FROM ?_pictures  WHERE id=?",$_GET['id']);
	/* TO EDIT */
	@unlink($root_abs.$pic['picture']);
	@unlink($root_abs.$pic['picture_sm']);
	@unlink($root_abs.$pic['picture_big']);
	@unlink($root_abs.$pic['picture_origin']);
	$DB->query("delete FROM ?_pictures  WHERE id=?",$_GET['id']);
	$DB->query("delete FROM ?_pictures_to_pages  WHERE obj_id=?",$_GET['id']);
	show();//отображаем измененный список
}

function pic_edit() {
	global $smarty, $root_abs, $DB;
	$name =$DB->selectRow("SELECT ?# ,id FROM ?_".$_GET['table']."  WHERE id=?",get_langs('name'),$_GET['pic_id']);
	$smarty->assign('name',$name);
	$smarty->assign('table',$_GET['table']);
	$smarty->display('pic_fields.tpl');
}

function save_pic_name() {
	global $smarty, $root_abs, $DB,$langs;
	foreach ($langs as $key => $value) {
		if (!preg_match('//u', $_GET['name_'.$value])) {
			$_GET['name_'.$value]=iconv('windows-1251','utf-8',$_GET['name_'.$value]);
		}
	}
	$DB->query("Update ?_".$_GET['table']." set ?a WHERE id=?",to_insert_lang('name',$_GET,1),$_GET['id']);
	$name =$DB->selectRow("SELECT ?# ,id FROM ?_".$_GET['table']."  WHERE id=?",get_langs('name'),$_GET['id']);
	$smarty->assign('name',$name);
	$smarty->assign('table',$_GET['table']);
	$smarty->display('pic_fields_n.tpl');
}

function delete_object() {/* TO EDIT */
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow("SELECT icon,icon_sm  FROM ?_objects  WHERE id=?",$_GET['id']);
	/* TO EDIT */
	@unlink($root_abs.$pic['icon']);
	@unlink($root_abs.$pic['icon_sm']);
	$DB->query("delete FROM ?_objects_to_pages  WHERE obj_id=?",$_GET['id']);
	$DB->query("delete FROM ?_objects  WHERE id=?",$_GET['id']);
	show();//отображаем измененный список
}

function delete_file() {/* TO EDIT */
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow("SELECT file,id  FROM ?_files  WHERE id=?",$_GET['to_delete']);
	/* TO EDIT */
	@unlink($root_abs.$pic['file']);
	$DB->query("delete FROM ?_files_to_objects  WHERE obj_id=?",$_GET['to_delete']);
	$DB->query("delete FROM ?_files_to_pages  WHERE obj_id=?",$_GET['to_delete']);
	$DB->query("delete FROM ?_files  WHERE id=?",$_GET['to_delete']);
	show();//отображаем измененный список
}

function unlink_object() {
	global $DB,$smarty;
	$DB->query("delete FROM ?_objects_to_pages  WHERE obj_id=? and page_id=?",$_GET['id'],$_GET['link_to']);
	show();//отображаем измененный список
}

function unlink_file() {
	global $DB,$smarty;
	$DB->query("delete FROM ?_files_to_pages  WHERE obj_id=? and page_id=?",$_GET['id'],$_GET['link_to']);
	show();//отображаем измененный список
}

function unlink_file_obj() {
	global $DB,$smarty;
	$DB->query("delete FROM ?_files_to_objects  WHERE obj_id=? and page_id=?",$_GET['to_delete'],$_GET['id']);
	show();//отображаем измененный список
}

function link_object() {
	global $DB,$smarty,$admin;
	$rank=$DB->selectCell("select max(rank) from ?_objects_to_pages");
	$rank++;
	$data_to_save=array('obj_id'=>$_GET['id'],'page_id'=>$_GET['link_to'],'rank'=>$rank);
	$DB->query("insert into ?_objects_to_pages (?#) VALUES (?a)",array_keys($data_to_save), array_values($data_to_save));
	show_other_links();
	$smarty->display('link_obj.tpl');
	//show();
}

function link_file() {
	global $DB,$smarty,$admin;
	$rank=$DB->selectCell("select max(rank) from ?_files_to_pages");
	$rank++;
	$data_to_save=array('obj_id'=>$_GET['id'],'page_id'=>$_GET['link_to'],'rank'=>$rank);
	$DB->query("insert into ?_files_to_pages (?#) VALUES (?a)",array_keys($data_to_save), array_values($data_to_save));
	show_other_file_links();
	$smarty->display('link_file.tpl');
	//show();
}

function show_other_links() {
	global $DB,$smarty,$admin;
	if(!isset($_GET['page'])||$_GET['page']=='') {
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['objects_num'];
	}

	$data=$DB->selectPage($totalRows,
		"select ?#,?_objects_to_pages.obj_id, ?_pages.id FROM ?_pages left join ?_objects_to_pages on ?_pages.id=?_objects_to_pages.page_id WHERE active=1 and (?_objects_to_pages.obj_id not in (select ?_objects_to_pages.obj_id from ?_objects_to_pages where obj_id=?) or ?_objects_to_pages.obj_id is null) group by ?_pages.id order by ?#  LIMIT ?d, ?d",get_langs('menue'),$_GET['id'],get_langs('menue'),$start,$admin['objects_num']);
	$smarty->assign('data',$data);
	$pages_num=ceil($totalRows/$admin['objects_num']);
	$smarty->assign('pages_num',$pages_num);
	$data_selected=$DB->query("select ?#, ?_pages.id FROM ?_pages left join ?_objects_to_pages on ?_pages.id=?_objects_to_pages.page_id WHERE active=1 and ?_objects_to_pages.obj_id=? order by ?#",get_langs('menue'),$_GET['id'],get_langs('menue'));
	$smarty->assign('data_selected',$data_selected);;
	$smarty->assign('garmoshka_set',$garmoshka_set[$_GET['garmoshka_set_name']]);
	$smarty->assign('garmoshka_set_name',$_GET['garmoshka_set_name']);
	$me=$DB->selectRow("select ?#,id FROM ?_objects where id=?",get_langs('title'),$_GET['id']);
	$smarty->assign('me',$me);
	if(!isset($_GET['link_to'])) {
		$smarty->display('link_obj.tpl');
	}
}

function add_block() {
	global $DB,$smarty,$admin;
	$rank=$DB->selectCell("select max(rank) from ?_contact_page");
	$rank++;
	$data_to_save=array('id_cont'=>$_GET['id_cont'],'id_page'=>$_GET['issue_id'],'rank'=>$rank);
	$DB->query("insert into ?_contact_page (?#) VALUES (?a)",array_keys($data_to_save), array_values($data_to_save));
	show();//отображаем измененный список
}

function insert_tags() {
	global $DB,$smarty,$admin;
	$smarty->assign('table',$_GET['table']);
	$smarty->assign('id',$_GET['id']);
	$smarty->assign('issue_id',$_GET['issue_id']);
	if($_GET['table']=="objects"){
		$smarty->assign('update',"_obj");
	}
	$smarty->assign('garmoshka_set_name',$_GET['garmoshka_set_name']);
	$smarty->display('insert_tags.tpl');
}

function add_new_tag() {
	global $DB,$smarty,$admin;
	$tag_id=$DB->selectCell("select max(tag_id) as tag_id from ?_tags");
	$tag_id=$tag_id+1;
	$insert=array('id'=>$tag_id, 'rank'=>$tag_id,'active'=>1,'author'=>$_SESSION['id']);
	$insert=array_merge($insert,to_insert_lang('name',$_GET,0));
	$DB->query("insert into ?_tags (?#) VALUES (?a)",array_keys($insert), array_values($insert));
	show();//отображаем измененный список
}

/*-----ajaxed part for objects----*/
function delete_obj_pic() {
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow("SELECT * FROM ?_obj_pict  WHERE id=?",$_GET['pic_id']);
	/* TO EDIT */
	@unlink($root_abs.$pic['picture']);
	@unlink($root_abs.$pic['picture_sm']);
	@unlink($root_abs.$pic['picture_big']);
	@unlink($root_abs.$pic['picture_origin']);
	$DB->query("delete FROM ?_obj_pict  WHERE id=?",$_GET['pic_id']);
	show();//отображаем измененный список
}

function delete_manager_block(){
	global $smarty, $DB;
	$DB->query("delete FROM  ?_contact_page where id_cont=? and id_page=?", $_GET['id_cont'],$_GET['issue_id']);
	$smarty->assign('id',$_GET['id']);
	show();
}

function add_tag(){
	global $smarty, $DB;
	$data_to_save=array('page_id'=>$_GET['issue_id'],'tag_id'=>$_GET['tag_id']);
	$DB->query("insert into ?_tags_to_".$_GET['table']." (?#) values(?a)",array_keys($data_to_save), array_values($data_to_save));
	show();
}

function delete_tag(){
	global $smarty, $DB;
	$DB->query("delete from ?_tags_to_".$_GET['table']." where id=?",$_GET['link_id']);
	show();
}

/*--ajaxed part end--*/
/*--help functions--*/
function versions($id){
	global $smarty, $DB;
	$select=array_merge(get_langs('menue'));//подготовка полей, которые отличаются в разных языковых версиях
	$data = $DB->select("SELECT ?_pages.page_id, ?_pages.id,login as author,time, ?#  FROM ?_pages left join ?_users on ?_users.id=?_pages.author WHERE ?_pages.id=? order by time desc", $select,$id);
	$smarty->assign('data',$data);
}

function manager_block(){
	global $smarty, $DB;
	$data = $DB->select("SELECT *,?_contact.id as me FROM ?_contact left join ?_contact_page on ?_contact.id=?_contact_page.id_cont order by ?_contact_page.rank");
	$smarty->assign('data',$data);
	$smarty->assign('parameters',$parameters['pages']);
}

function descr($id){
	global $smarty, $DB;
	$select=array_merge(get_langs('keywords'), get_langs('meta_descr'));//подготовка полей, которые отличаются в разных языковых версиях
	$data = $DB->selectRow("SELECT ?#, id FROM ?_pages WHERE active=1 and id=?", $select, $id);
	$smarty->assign('data',$data);
}

function icon($id){
	global $smarty, $DB,$image_size;
	$icon = $DB->selectCell("SELECT icon_sm  FROM ?_pages WHERE active=1 and id=?", $id);
	$smarty->assign('icon',$icon);
	$smarty->assign('image_size',$image_size);
	$data = $DB->selectRow("SELECT icon  FROM ?_pages WHERE active=1 and id=?", $id);
	$smarty->assign('data',$data);
}

function page_settings($id){
	global $smarty, $DB,$parameters,$page_types;
	$smarty->assign('page_types',$page_types);
	foreach ($parameters['pages'] as $key => $value) {
		$str.=$value['name']." ,";
	}
	$data = $DB->selectRow("SELECT ".$str." id, link FROM ?_pages WHERE active=1 and id=?", $id);
	$smarty->assign('data',$data);
	//var_dump($parameters['pages']);
	$smarty->assign('parameters',$parameters['pages']);
}

function pictures($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']=='') {
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['pictures_num'];
	}

	$data = $DB->selectPage(
		$totalRows,"Select ?_pictures.id,?_pictures.picture_prev,?_pictures_to_pages.id as link_id,?# from ?_pictures
			left join ?_pictures_to_pages on ?_pictures.id=?_pictures_to_pages.obj_id
			where
			?_pictures_to_pages.page_id=?
			 order by ?_pictures_to_pages.rank",
		get_langs('name'),$id
	);

	$pages_num=ceil($totalRows/$admin['pictures_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('pics',$data);
}

function tags($id){
	global $smarty, $DB,$admin;
	$selected = $DB->select("Select ?_tags.id,?_tags_to_pages.id as link_id,?_tags_to_pages.page_id,?# from ?_tags
			left join ?_tags_to_pages on ?_tags.id=?_tags_to_pages.tag_id
			where
			?_tags.active='1' and ?_tags_to_pages.page_id=?
			order by ?# ",get_langs('name'),$_GET['issue_id'],get_langs('name'));
	$smarty->assign('selected',$selected);
	$data = $DB->select("Select ?_tags.id,?# from ?_tags
			where
			?_tags.active='1' and ?_tags.id not in (select ?_tags.id from ?_tags
			left join ?_tags_to_pages on ?_tags.id=?_tags_to_pages.tag_id
			where
			?_tags.active='1' and ?_tags_to_pages.page_id=?)
			 order by ?# ",get_langs('name'),$_GET['issue_id'],get_langs('name'));
	$smarty->assign('data',$data);
}

function tags_obj($id){
	global $smarty, $DB,$admin;
	$selected = $DB->select("Select ?_tags.id,?_tags_to_objects.id as link_id,?_tags_to_objects.page_id,?# from ?_tags
			left join ?_tags_to_objects on ?_tags.id=?_tags_to_objects.tag_id
			where
			?_tags.active='1' and ?_tags_to_objects.page_id=?
			order by ?# ",get_langs('name'),$_GET['id'],get_langs('name'));
	$smarty->assign('selected',$selected);
	$data = $DB->select("Select ?_tags.id,?# from ?_tags
			where
			?_tags.active='1' and ?_tags.id not in (select ?_tags.id from ?_tags
			left join ?_tags_to_objects on ?_tags.id=?_tags_to_objects.tag_id
			where
			?_tags.active='1' and ?_tags_to_objects.page_id=?)
			 order by ?# ",get_langs('name'),$_GET['id'],get_langs('name'));
	$smarty->assign('data',$data);
}

function objects($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']==''){
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['objects_num'] ;
	}
	$data = $DB->selectPage(
		$totalRows,
		"Select ?_objects.id,?_objects_to_pages.id as link_id,?# from ?_objects
			left join ?_objects_to_pages on ?_objects.id=?_objects_to_pages.obj_id
			where
			?_objects_to_pages.page_id=?
			and ?_objects.active='1'
			order by ?_objects_to_pages.rank LIMIT ?d, ?d",
		get_langs('title'),$id,$start,$admin['objects_num']
	);

	$pages_num=ceil($totalRows/$admin['objects_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('objects',$data);
}

function files($id) {
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']==''){
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['objects_num'];
	}
	$data = $DB->selectPage(
		$totalRows,
		"Select ?_files.id,?_files.file,?_files_to_pages.id as link_id,?# from ?_files
			left join ?_files_to_pages on ?_files.id=?_files_to_pages.obj_id
			where
			?_files_to_pages.page_id=?
			order by ?_files_to_pages.rank LIMIT ?d, ?d",
		get_langs('name'),$id,$start,$admin['objects_num']);
	$pages_num=ceil($totalRows/$admin['objects_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('objects',$data);
}

function selected_objects($id){
	global $smarty, $DB,$admin, $parameters;
	if(!isset($_GET['page'])||$_GET['page']==''){
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['objects_num'];
	}
	$data = $DB->selectPage(
		$totalRows,
		"Select ?_objects.id,?# from ?_objects
			where
			?_objects.selected=1
			and ?_objects.active='1'
			order by rank LIMIT ?d, ?d",
		 get_langs('title'),$start,$admin['objects_num']);
	$pages_num=ceil($totalRows/$admin['objects_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('objects',$data);
}


/*--help functions--for objects----*/
function versions_obj($id){
	global $smarty, $DB;
	$select=array_merge(get_langs('title'));//подготовка полей, которые отличаются в разных языковых версиях
	//$pages = $DB->select("SELECT * FROM ?_pages WHERE page_id=?",$_REQUEST['page_id']);
	$data = $DB->select("SELECT ?#, ?_objects.obj_id,?_objects.id, time, login as author  FROM ?_objects left join ?_users on ?_users.id=?_objects.author WHERE ?_objects.id=? order by time desc",$select, $id);
	$smarty->assign('data',$data);
}

function icon_obj($id){
	global $smarty, $DB,$image_size;
	$icon = $DB->selectRow("SELECT icon,icon_sm FROM ?_objects WHERE active=1 and id=?", $id);
	$smarty->assign('icon_sm',$icon['icon_sm']);
	$smarty->assign('image_size',$image_size);
	$data = $DB->selectRow("SELECT icon,icon_sm FROM ?_objects WHERE active=1 and id=?", $id);
	$smarty->assign('data',$data);
}

function obj_settings($id){
	global $smarty, $DB,$parameters;
	foreach ($parameters['objects'] as $key => $value) {
		$str.=$value['name']." ,";
	}
	$data = $DB->selectRow("SELECT ".$str." id FROM ?_objects WHERE active=1 and id=?", $id);
	$smarty->assign('data',$data);
	$smarty->assign('parameters',$parameters['objects']);
}

function pics_obj($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']=='') {
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['pictures_num'];
	}

	$data = $DB->selectPage(
		$totalRows,
		"SELECT * FROM ?_obj_pict WHERE obj_id=? order by rank LIMIT ?d, ?d",
		$id,$start,$admin['pictures_num']);
	$pages_num=ceil($totalRows/$admin['pictures_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('pics',$data);
}

function files_obj($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']==''){
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['objects_num'];
	}

	$data = $DB->selectPage(
		$totalRows,
		"Select ?_files.id,?_files.file,?_files_to_objects.id as link_id,?# from ?_files
			left join ?_files_to_objects on ?_files.id=?_files_to_objects.obj_id
			where
			?_files_to_objects.page_id=?
			order by ?_files_to_objects.rank LIMIT ?d, ?d",
		get_langs('name'),$id,$start,$admin['objects_num']);
	$pages_num=ceil($totalRows/$admin['objects_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('objects',$data);
}
//kml_functions

function delete_obj_kml() {
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow("SELECT icon  FROM ?_kml  WHERE id=?",$_GET['pic_id']);
	/* TO EDIT */
	@unlink($root_abs.$pic['icon']);
	$DB->query("delete FROM ?_obj_kml  WHERE kml_id=? and obj_id=?",$_GET['pic_id'],$_GET['id']);
	$DB->query("delete FROM ?_kml  WHERE id=?",$_GET['pic_id']);
	show();//отображаем измененный список
}

function delete_kml() {
	global $smarty, $root_abs, $DB;
	$DB->query("delete FROM ?_".$_GET['table']."_kml  WHERE id=?",$_GET['pic_id']);
	$DB->query("delete FROM ?_kml  WHERE id=?",$_GET['pic_id']);
	show();//отображаем измененный список
}

function delete_kml_pic(){
	global $smarty, $root_abs, $DB;
	$pic =$DB->selectRow("SELECT icon,id  FROM ?_kml_style  WHERE id=?",$_GET['pic_id']);
	/* TO EDIT */
	@unlink($root_abs.$pic['icon']);
	$DB->query("update ?_kml set icon='' WHERE id=?",$_GET['pic_id']);
	$DB->query("delete FROM ?_kml_style  WHERE id=?",$_GET['pic_id']);
	show();//отображаем измененный список
}

function kml_obj($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']==''){
		$start=0;
	} else { $start=($_GET['page']-1)*$admin['kml_num'];}

	$data = $DB->selectPage(
		$totalRows,
		"SELECT * FROM ?_kml left join ?_obj_kml on ?_kml.id=?_obj_kml.kml_id WHERE obj_id=? LIMIT ?d, ?d",
		$id,$start,$admin['kml_num']);
	$pages_num=ceil($totalRows/$admin['kml_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('table','obj');
	$smarty->assign('pics',$data);
	$styles=$DB->select("SELECT * FROM ?_kml_style");
	$smarty->assign('styles',$styles);
}

function kml_pics($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']=='') {
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['kml_num'];
	}

	$data = $DB->selectPage(
		$totalRows,
		"SELECT * FROM ?_kml_style LIMIT ?d, ?d",
		$start,$admin['kml_num']
	);
	$pages_num=ceil($totalRows/$admin['kml_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('pics',$data);
}

function kml_page($id){
	global $smarty, $DB,$admin;
	if(!isset($_GET['page'])||$_GET['page']==''){
		$start=0;
	} else {
		$start=($_GET['page']-1)*$admin['kml_num'];
	}

	$data = $DB->selectPage(
		$totalRows,
		"SELECT * FROM ?_kml left join ?_page_kml on ?_kml.id=?_page_kml.kml_id WHERE obj_id=? LIMIT ?d, ?d",
		$id,$start,$admin['kml_num']);
	$pages_num=ceil($totalRows/$admin['kml_num']);
	$smarty->assign('pages_num',$pages_num);
	$smarty->assign('table','page');
	$smarty->assign('pics',$data);
	$styles=$DB->select("SELECT * FROM ?_kml_style");
	$smarty->assign('styles',$styles);
}

function map_obj($id){
	global $smarty, $DB,$parameters;
	$select=array("show_map", "zoom", "lat", "long", "map_type","id");
	$data = $DB->selectRow("SELECT ?# FROM ?_objects WHERE active=1 and id=?",$select, $id);
	$smarty->assign('data',$data);
}

function map_page($id){
	global $smarty, $DB,$parameters;
	$select=array("show_map", "zoom", "lat", "long", "map_type", "id");
	$data = $DB->selectRow("SELECT ?# FROM ?_pages WHERE active=1 and id=?",$select, $id);
	$smarty->assign('data',$data);
}

/*--help functions end--*/
?>
