/*
 * Подключение TinyMCE
 */	$().ready(function() {
		CKEDITOR.replace( 'pagetext',
		    {
		       filebrowserBrowseUrl :'/home/localhost/www/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Connector=http://localhost/kaktus/admin/libs/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserImageBrowseUrl : '/home/localhost/www/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=http://localhost/kaktus/admin/libs/ckeditor/filemanager/connectors/php/connector.php',
                filebrowserFlashBrowseUrl :'/home/localhost/www/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=http://localhost/kaktus/admin/libs/ckeditor/filemanager/connectors/php/connector.php',
				filebrowserUploadUrl  :'http://localhost/kaktus/admin/libs/ckeditor/filemanager/connectors/php/upload.php?Type=File',
				filebrowserImageUploadUrl : 'http://localhost/kaktus/admin/libs/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
				filebrowserFlashUploadUrl : 'http://localhost/kaktus/admin/libs/ckeditor/filemanager/connectors/php/upload.php?Type=Flash',
				uiColor = '#33cc66';
		    });
		/*
		$('textarea.editor').tinymce({
			// Location of TinyMCE script
			script_url : '/libs/tiny_mce/tiny_mce.js',
            language : "ru",
			relative_urls : false,
			file_browser_callback : 'myFileBrowser',
			// General options
			theme : "advanced",
			plugins : "safari,table,advimage,advlink,inlinepopups,contextmenu,paste,noneditable,visualchars,nonbreaking",
			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontsizeselect,|,code",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,forecolor",
			theme_advanced_buttons3 : "tablecontrols,|,visualaid,visualchars,nonbreaking,removeformat",
			theme_advanced_buttons4 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
            content_css : "/cstyle.css",
			paste_auto_cleanup_on_paste : true
		});
	});

function myFileBrowser (field_name, url, type, win) {

     //alert("Field_Name: " + field_name + "\nURL: " + url + "\nType: " + type + "\nWin: " + win); // debug/testing
    var cmsURL = document.location.protocol.toString()+'//'+document.location.host.toString()+'/admin/file.php?type='+type;    // script URL - use an absolute path!

    //alert(cmsURL);

    tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Xcr File Browser',
        width : 820,  // Your dimensions may differ - toy around with them!
        height : 500,
        resizable : "yes",
        inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
        close_previous : "no"
    }, {
        window : win,
        input : field_name
    });
    return false;*/
});
