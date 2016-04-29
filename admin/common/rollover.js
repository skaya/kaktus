	function initRollOver() {
		//Set up mask
		var mask = "menuLink";
		//		
		for(var i = 0; i < document.links.length; i++) {
			if( document.links[i].id.indexOf(mask) != -1 ) {
				setEvent(document.links[i].id);
			}
		}
	}
	function setEvent(ID) {
		var mItem = document.getElementById(ID);
		var pNode = mItem.parentNode;
		//
		pNode.onclick = function() {
			document.location.href = mItem.href;
		}
		//
		pNode.onmouseover = function() {
			this.style.cursor = "pointer";
			mItem.style.color = "#ffffff";
		}
		//
		pNode.onmouseout  = function() {
			this.style.cursor = "pointer";
			mItem.style.color = "#D1E0ED";
		}
	}