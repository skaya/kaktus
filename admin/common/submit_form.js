function submit_menue(page_id, action) {
	document.all.page_id.value   = page_id;
	document.all.action.value = action;
	document.all.obj.submit();	
}

function submit_page(men, action) {
	document.all.menue.value= men;
	document.all.action.value = action;
	document.all.page_templ.submit();	
}