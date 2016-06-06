<?php
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0

require("config.php");

$query=$DB->query("SELECT * FROM extra_texts");


while ($row = $query -> fetch_assoc()){
    $extras[$row['name']] = $row['text'];
}

$smarty->assign('extra',$extras);



?>
