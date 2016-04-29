function add_page(id, lin) {
	for ($i=0;$i<15;$i++)
	{
	if(document.getElementById('form_register').link[$i].value=lin)
	{$num=$i;
	break;}
	}	
	document.getElementById('choose').style.display='';
	document.getElementById('tree_message').style.display='none';
	document.getElementById('form_register').style.display='';
	document.getElementById('menue').value='';
	document.getElementById('form_register_issue_id').value=id;
	document.getElementById('form_register').link[$num].checked='checked';
	//return false;
}
function close_add_page(parent){ 
	var container;
document.getElementById('tree_message').style.display='';
	document.getElementById('form_register').style.display='none';
 setTimeout("close_add_page_end("+container+","+parent+")",3000);

}  

function close_add_page_end(container,parent){
if(parent!=0)
 {container="tree_line"+parent;
 document.getElementById('point'+parent).src='admin_img/close_level.gif';}
 else
 {container="tree_0"}
SmartyAjax.update(container, "index.php", "get", "id="+parent+"&f=select_subtree");
document.getElementById('choose').style.display='none';
document.getElementById(container).style.display='';
return false;
}

function refresher(id){
container="link"+id;
SmartyAjax.update(container, "index.php", "get", "id="+id+"&f=refresher");
return false;
}

function close_add(){ 
	document.getElementById('choose').style.display='none';

}  
 