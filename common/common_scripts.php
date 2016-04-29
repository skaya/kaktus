<?php
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                        // HTTP/1.0

require("common.php");
require("connect_templates.php");

$smarty->assign("root",$root);



if($_REQUEST['lang']=="")
	{$lang=$langs[0];//default language
	}
else if ($_REQUEST['lang']!='')
	{$lang=$_REQUEST['lang'];}

$smarty->assign('lang',$lang);
//require("dateFormats.php");


$extra=$DB->select("SELECT * FROM ?_extra_texts");

while (list ($key, $val) = each ($extra)) {
    $extras[$val['name']]=$val[get_current_lang('text')];
}
$smarty->assign('extra',$extras);


?>
