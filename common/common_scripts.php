<?php
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0

require("config.php");

// function GetChild($id) {
//   global $DB, $kol, $nom, $points;

//   $a = array();
//   $rst = mysql_query("SELECT id,title,menue ,link,parent_id FROM pages WHERE parent_id='".$id."' and is_shown=1 order by rank");
//   print mysql_error();
//   if($id==0) {
//     $width=100/mysql_num_rows($rst);
//     $smarty->assign('width',$width);
//   }

//   //$level++;
//   while ($line = mysql_fetch_assoc($rst)){
//     $g=GetChild($line['id']);
//   /*
//     if (in_array ($line['id'], $points))
//     {$line['class']="sel";}  */
//     array_push($a, array("id"=>$line['id'],"menue"=>$line['menue'],"link"=>$line['link'],"parent_id"=>$line['parent_id'],"class"=>$line['class'],"array"=>$g));
//   }

//   return $a;
// }

$query=$DB->query("SELECT * FROM extra_texts");


while ($row = $query -> fetch_assoc()){
    $extras[$row['name']] = $row['text'];
}

$smarty->assign('extra',$extras);



?>
