function enlarge(id) {
	document.getElementById(id).style.display="none";	
}
function smaller(id) {
	document.getElementById(id).style.display="";
}
function resize(me,me_resizer,id,id_resizer) {
	if(document.getElementById(id).style.display!="none")
	{ document.getElementById(id).style.display="none";
	document.getElementById(me_resizer).src="admin_img/resize_smaller.gif";
	}else{
		document.getElementById(id).style.display="";
		document.getElementById(me_resizer).src="admin_img/resize_bigger.gif";
		}
}