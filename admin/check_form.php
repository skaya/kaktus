<?
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0
require("common/connect_templates.php");

if (!empty($_POST)) {
  $id=$DB->selectCell("select MAX(page_id) from ?_pages");
  if($id=='') {
		$id=1;
	}
  
  $insert=array('id'=>$id,'rank'=>$id,'parent_id'=>$_POST['issue_id'],'menue_'.$langs[0]=>$_POST['menue'],'link'=>$_POST['link'],'title_'.$langs[0]=>$_POST['menue'],'active'=>1);

	$DB->query("insert into ?_pages (?#) VALUES(?a)",array_keys($insert),array_values($insert));
	$id=$DB->selectRow("select page_id, parent_id from ?_pages where id=?",$id++);
}
?>