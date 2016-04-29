<?php
require("../common/common.php");
session_start();

function check_login()
{
//	echo $_SESSION['admin'];
	if($_SESSION['loginkl82']=="admin")
		return true;

};
if($report_errors==1)
{

	require_once($root_abs.'common/error_reporting.php');
}
if (!check_login())
{header("location:login.php");
exit();}

$smarty->template_dir = $root_abs.'admin/templates/';
$smarty->compile_dir = 	$root_abs.'admin/templates_c/';
$smarty->assign('text_box5_width',floor(100/count($langs))-1);

require("rus_to_lat.php");
require("resize_img.php");
require("delete_spaces.php");
// axaj inclusion
require("ajaxed_functions.php");
ajax_register('load_page');
ajax_register('select_subtree');
ajax_register('change_rank');
ajax_register('delete_page');
ajax_register('add_page');
ajax_register('show');
ajax_register('hide');
ajax_register('load_object');
ajax_register('show_page');
ajax_register('delete_pic');
ajax_register('pic_edit');
ajax_register('save_pic_name');
ajax_register('delete_object');
ajax_register('delete_file');
ajax_register('unlink_object');
ajax_register('unlink_file');
ajax_register('unlink_file_obj');
ajax_register('link_object');
ajax_register('link_file');
ajax_register('show_other_links');
ajax_register('show_other_file_links');
ajax_register('delete_obj_pic');
ajax_register('delete_obj_kml');
ajax_register('delete_kml');
ajax_register('add_block');
ajax_register('delete_u_block');
ajax_register('refresher');
ajax_register('ierarch_up');
ajax_process_call();

// axaj inclusion end

?>
