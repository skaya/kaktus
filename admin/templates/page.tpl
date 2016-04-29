<html>
	<head>
		<title>{$title}</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="common/style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="{$root}js/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="{$root}js/jquery-ui-1.8.17.min.js"></script>
		<script type="text/javascript" src="common/toggle.js"></script>
		<script type="text/javascript" src="common/showpng.js"></script>
		<script type="text/javascript" src="common/confirm_delete.js"></script>
		<script type="text/javascript" src="common/add_page.js"></script>
		<script type="text/javascript" src="common/upload_pic.js"></script>
		<script type="text/javascript" src="{$root}libs/js/prototype.js"></script>
		<script type="text/javascript" src="{$root}libs/js/smarty_ajax.js"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="js/texteditor.js"></script>
		<script type="text/javascript" src="common/enlarge.js"></script>
	</head>

	<body {if $cur_page==main}onLoad="{ajax_update update_id="tree_container" function="select_subtree" params="id=0"}"{/if}>
		<noscript>
			<div id="js_alert">Ваш браузер не поддерживает Javascript. Некоторые функции сайта будут недоступны!</div>
		</noscript>

		{literal}
	<script type="text/javascript">
		// CKEDITOR.replace( 'pagetext', {
		// 	filebrowserBrowseUrl :'/Applications/MAMP/htdocs/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Connector=http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/connector.php',
	 //    filebrowserImageBrowseUrl : '/Applications/MAMP/htdocs/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/connector.php',
	 //    filebrowserFlashBrowseUrl :'/Applications/MAMP/htdocs/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/connector.php',
		// 	filebrowserUploadUrl  :'http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/upload.php?Type=File',
		// 	filebrowserImageUploadUrl : 'http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
		// 	filebrowserFlashUploadUrl : 'http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
		// });
		jQuery.noConflict();

		jQuery(document).ready(function(){
	    jQuery(".browse_form_button").on('change', function() {
	      if (jQuery(this).val() != '') {
	        jQuery(this).parents('.upload_pic_form').submit();
	      }
	    })
	  });
	</script>
	{/literal}

		<div id="bg-left"></div>
		<div id="bg-right"></div>
		<div id="bg-img">
			<div class="header-area">
				<div class="top-menue">
					<a href="index.php" target="_self" style="border-left:1px solid Black;"{if $cur_page==main}id="selected"{/if} class="menue">Основные разделы</a>
					<a href="extras.php?issue_id=0" target="_self" class="menue" {if $cur_page==extras}id="selected"{/if}>Колонтитулы</a>
				</div>

				<div class="logout-area">
					<a href="{$root}admin/login.php?action=logout" target="_self" style="text-align:" alt="Выйти">
						<img src="admin_img/exit.png" alt="Выйти" width="36" height="36" hspace="2" vspace="10" class="sub_menue">
					</a>
				</div>
			</div>

			<div class="left-area">
				{$left}
			</div>

			<div class="right-area">
				<h2>{$pages.menue}</h2>

				<div id="main_content">
					<form name="page_templ" id="page_templ" action="page.php" method="post" enctype="multipart/form-data" >
						{include file="page_top.tpl"}

						<textarea class="ckeditor" id="pagetext" name="pagetext">
							{$page_text}
						</textarea>
						<input type="submit"   value="Сохранить" id="save_but">
					</form>

					<div id="gallery-big">
						<h2> Портфолио ({$kol_photo} фото) </h2>
						<div id="gallery-pics">
							{include file="pictures.tpl"}
						</div>
						<div class="add-picture-form">
							<form action="upload.php" method="post" class="upload_pic_form" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
								<input type="hidden" name="issue_id" value="{$issue_id}" />
								<input type="hidden" name="to_connect" value="page" />
								<input type="hidden" name="upload_type" value="image" />
								<p id="f1_upload_process" class="text_discr">
									Идет загрузка...
									<br/>
									<img src="loader.gif" />
									<br/>
								</p>
								<p id="f1_upload_message"></p>
								<p id="f1_upload_form" align="center">
									<label class="text_discr"> Название:</label>
									{section loop=$langs name=l}
										<input type="text" name="name_{$langs[l]}"   id="name_{$langs[l]}"  size="30"  class="text_box" style="background-image:url(admin_img/flags/{$langs[l]}.gif)"/>
									{/section}
									<input name="myfile" id="myfile" type="file" size="30" class="browse_form1 browse_form_button" />
									<input type="submit" name="submitBtn" value="Добавить" class="mini_save photo"  />
								</p>
							 <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px;"></iframe>
							</form>
						</div>

					</div>
				</div>

				<div id="garmoshka">
					{$garmoshka}
				</div>

			</div>

			<div class="footer-area">
			</div>

		</div>
	</body>
</html>

