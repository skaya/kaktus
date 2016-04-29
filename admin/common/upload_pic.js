function startUpload(){
  document.getElementById('f1_upload_process').style.visibility = 'visible';
  document.getElementById('f1_upload_form').style.visibility = 'hidden';
  return true;
}

function stopUpload(issue_id){
  var order = '&issue_id='+issue_id+'&update=picList';
    jQuery.post("portfolio.php", order, function(theResponse){
      jQuery("#gallery-pics").html(theResponse);
    });

  document.getElementById('f1_upload_process').style.visibility = 'hidden';
  document.getElementById('f1_upload_form').style.visibility = 'visible';
  // SmartyAjax.update('gallery-list', 'portfolio.php', 'get', 'issue_id='+issue_id+'&f=updatePicList');
  // return false;
}
function stopUpload_icon(issue_id,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=icon&garmoshka_set_name='+garmoshka_set_name+'&issue_id='+issue_id+'&f=show'); return false;
}
function stopUploadObj(issue_id,page,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=pics_obj&garmoshka_set_name='+garmoshka_set_name+'&page='+page+'&id='+issue_id+'&f=show'); return false;
}
function stopUploadObj_icon(issue_id,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=icon_obj&garmoshka_set_name='+garmoshka_set_name+'&id='+issue_id+'&f=show'); return false;
}
function stopUploadObj_kml(issue_id,page,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=kml_obj&garmoshka_set_name='+garmoshka_set_name+'&page='+page+'&id='+issue_id+'&f=show'); return false;
}
function stopUploadPage_kml(issue_id,page,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=kml_page&garmoshka_set_name='+garmoshka_set_name+'&page='+page+'&issue_id='+issue_id+'&f=show'); return false;
}
function stopUpload_file(issue_id,page,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=files&garmoshka_set_name='+garmoshka_set_name+'&page='+page+'&issue_id='+issue_id+'&f=show'); return false;
}
function stopUploadObj_file(issue_id,page,garmoshka_set_name){
	  SmartyAjax.update('garmoshka', 'garmoshka.php', 'get', 'part=files_obj&garmoshka_set_name='+garmoshka_set_name+'&page='+page+'&id='+issue_id+'&f=show'); return false;
}
