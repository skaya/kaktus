function showWind(kol) {
    return showModalDialog('little.php?kol=' + kol, 
      'dialogHeight:250px; dialogWidth:366px; resizable:no; status:no');  
  } 

var g=0;

function toggle_kl(e,to) {
	
  if (document.getElementById(to).style.display == "none") {
	
        document.getElementById(to).style.display = ""; 
		e.src = "admin_img/close_level.gif";
	        
	
} else {
	
       document.getElementById(to).style.display = "none";
		e.src = "admin_img/open_level.gif";
   
   }

}
function toggle_hide_me(e,to) {
	
       document.getElementById(to).style.display = "";
		e.style.display = "none";
}



function color(f)
{
	document.getElementById(f).style.color="#FF9100";
	if (document.getElementById(fold)&&fold!=f)
		document.getElementById(fold).style.color="";
	fold=f;
}
var fold='';
function me_color(f,color)
{   if (fold!='')
		fold.style.color="";
	f.style.color=color;
	
	fold=f;
}




