<?php /* Smarty version 2.6.12, created on 2015-11-24 01:04:22
         compiled from page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'page.tpl', 20, false),)), $this); ?>
<html>
	<head>
		<title><?php echo $this->_tpl_vars['title']; ?>
</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="common/style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['root']; ?>
js/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['root']; ?>
js/jquery-ui-1.8.17.min.js"></script>
		<script type="text/javascript" src="common/toggle.js"></script>
		<script type="text/javascript" src="common/showpng.js"></script>
		<script type="text/javascript" src="common/confirm_delete.js"></script>
		<script type="text/javascript" src="common/add_page.js"></script>
		<script type="text/javascript" src="common/upload_pic.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['root']; ?>
libs/js/prototype.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['root']; ?>
libs/js/smarty_ajax.js"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="js/texteditor.js"></script>
		<script type="text/javascript" src="common/enlarge.js"></script>
	</head>

	<body <?php if ($this->_tpl_vars['cur_page'] == main): ?>onLoad="<?php echo smarty_function_ajax_update(array('update_id' => 'tree_container','function' => 'select_subtree','params' => "id=0"), $this);?>
"<?php endif; ?>>
		<noscript>
			<div id="js_alert">Ваш браузер не поддерживает Javascript. Некоторые функции сайта будут недоступны!</div>
		</noscript>

		<?php echo '
	<script type="text/javascript">
		// CKEDITOR.replace( \'pagetext\', {
		// 	filebrowserBrowseUrl :\'/Applications/MAMP/htdocs/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Connector=http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/connector.php\',
	 //    filebrowserImageBrowseUrl : \'/Applications/MAMP/htdocs/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/connector.php\',
	 //    filebrowserFlashBrowseUrl :\'/Applications/MAMP/htdocs/kaktus/admin/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/connector.php\',
		// 	filebrowserUploadUrl  :\'http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/upload.php?Type=File\',
		// 	filebrowserImageUploadUrl : \'http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/upload.php?Type=Image\',
		// 	filebrowserFlashUploadUrl : \'http://localhost:8888/kaktus/admin/ckeditor/filemanager/connectors/php/upload.php?Type=Flash\'
		// });
		jQuery.noConflict();

		jQuery(document).ready(function(){
	    jQuery(".browse_form_button").on(\'change\', function() {
	      if (jQuery(this).val() != \'\') {
	        jQuery(this).parents(\'.upload_pic_form\').submit();
	      }
	    })
	  });
	</script>
	'; ?>


		<div id="bg-left"></div>
		<div id="bg-right"></div>
		<div id="bg-img">
			<div class="header-area">
				<div class="top-menue">
					<a href="index.php" target="_self" style="border-left:1px solid Black;"<?php if ($this->_tpl_vars['cur_page'] == main): ?>id="selected"<?php endif; ?> class="menue">Основные разделы</a>
					<a href="extras.php?issue_id=0" target="_self" class="menue" <?php if ($this->_tpl_vars['cur_page'] == extras): ?>id="selected"<?php endif; ?>>Колонтитулы</a>
				</div>

				<div class="logout-area">
					<a href="<?php echo $this->_tpl_vars['root']; ?>
admin/login.php?action=logout" target="_self" style="text-align:" alt="Выйти">
						<img src="admin_img/exit.png" alt="Выйти" width="36" height="36" hspace="2" vspace="10" class="sub_menue">
					</a>
				</div>
			</div>

			<div class="left-area">
				<?php echo $this->_tpl_vars['left']; ?>

			</div>

			<div class="right-area">
				<h2><?php echo $this->_tpl_vars['pages']['menue']; ?>
</h2>

				<div id="main_content">
					<form name="page_templ" id="page_templ" action="page.php" method="post" enctype="multipart/form-data" >
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<textarea class="ckeditor" id="pagetext" name="pagetext">
							<?php echo $this->_tpl_vars['page_text']; ?>

						</textarea>
						<input type="submit"   value="Сохранить" id="save_but">
					</form>

					<div id="gallery-big">
						<h2> Портфолио (<?php echo $this->_tpl_vars['kol_photo']; ?>
 фото) </h2>
						<div id="gallery-pics">
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pictures.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						</div>
						<div class="add-picture-form">
							<form action="upload.php" method="post" class="upload_pic_form" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
								<input type="hidden" name="issue_id" value="<?php echo $this->_tpl_vars['issue_id']; ?>
" />
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
									<?php unset($this->_sections['l']);
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['langs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>
										<input type="text" name="name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"   id="name_<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
"  size="30"  class="text_box" style="background-image:url(admin_img/flags/<?php echo $this->_tpl_vars['langs'][$this->_sections['l']['index']]; ?>
.gif)"/>
									<?php endfor; endif; ?>
									<input name="myfile" id="myfile" type="file" size="30" class="browse_form1 browse_form_button" />
									<input type="submit" name="submitBtn" value="Добавить" class="mini_save photo"  />
								</p>
							 <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px;"></iframe>
							</form>
						</div>

					</div>
				</div>

				<div id="garmoshka">
					<?php echo $this->_tpl_vars['garmoshka']; ?>

				</div>

			</div>

			<div class="footer-area">
			</div>

		</div>
	</body>
</html>
