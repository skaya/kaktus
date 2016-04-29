<html>
<head>
<title>{$title}</title>
<link href="common/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="common/showpng.js"></script>
<script type="text/javascript" src="{$root}libs/js/prototype.js"></script>
<script type="text/javascript" src="{$root}libs/js/smarty_ajax.js"></script>
<script type="text/javascript" src="common/InputPlaceholder.js"></script> 
<script type="text/javascript" src="common/enlarge.js"></script> 
<script type="text/javascript" src="common/add_page.js"></script> 
<script type="text/javascript" src="common/upload_pic.js"></script> 
<script type="text/javascript" src="common/confirm_delete.js"></script> 

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body onLoad="{if $cur_page==main}{ajax_update update_id="tree_container" function="select_subtree" params="id=0"}{/if}" >
<noscript>
<div id="js_alert">Ваш браузер не поддерживает Javascript. Некоторые функции сайта будут недоступны!</div>
</noscript>
<h2>{$pages.title}</h2>

 <table width="100%" height="90%">
	<tr>
	 <form name="page_templ" id="page_templ" action="page.php" method="post" enctype="multipart/form-data" ><td width="73%" id="main_content" valign="top">
			<table cellpadding="0" cellspacing="0" width="100%"> 
             
              {include file="page_top.tpl"}
                <tr>
       			  <td align="right" width="20%"><div class="text_discr" >Ссылка:</div></td>
                    <td align="left" width="80%">
                    {section loop=$langs name=l}{assign var=field value=text_$langs[l]}
  <input type="text" class="text_box5"  name="text_{$langs[l]}" size="300" value="{$pages.$field |escape}{if $pages.$field==''}({$langs[l]}){/if}" class="text_box" />
{/section}
       			    </td>
     			</tr>
 	 		<tr>
        		<td colspan="2" align="left">
                
                <input type="button" onClick="document.getElementById('page_templ').submit()"  value="Сохранить" id="save_but"></td>
     		</tr>
 		</table>
        <a href="#" ><img src="admin_img/resize_bigger.gif" width="9" height="9" vspace="1" hspace="1" id="main_resizer" onClick="resize('main_content','main_resizer','garmoshka','garmoshka_resizer');"></a>
   	</td></form> 

    <td width="27%" id="garmoshka"> 
{$garmoshka}


      </td>
        
     </tr> </table>
    
     
        </body></html>
        
