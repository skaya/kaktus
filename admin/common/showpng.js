//*******************************************************//
//	Displays .PNG files in Microsoft Internet Explorer   //
//*******************************************************//
function transformLayOut(node)
{
	var div = document.createElement("span");
	div.style.width = node.offsetWidth;
	div.style.height = node.offsetHeight;
	div.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+ node.src + "', enabled=1)";
	var parent_node = node.parentNode;
	parent_node.removeChild(node);
	var block = parent_node.appendChild(div);
	block.appendChild(node);
	node.src="admin_img/0.gif";
}

function transformImg(node){
	var parent_node = node.parentNode;
	node.style.width = parent_node.offsetWidth;
	node.style.height = parent_node.offsetHeight;
	parent_node.style.background = "";
}

function showpng(){
	if(navigator.userAgent.indexOf("Opera") != -1) return;
	if(navigator.userAgent.indexOf("MSIE") != -1)
	with(document)
	{
		for(var i=0;i<images.length;i++){
			var imgObjSrc=images[i].src.toLowerCase();
			if(imgObjSrc.indexOf(".png")!=-1){
				transformImg(images[i]);
				transformLayOut(images[i]);
			}
		}
	}
}

