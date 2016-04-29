<?php /* Smarty version 2.6.12, created on 2015-11-24 01:00:23
         compiled from main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'ajax_update', 'main.tpl', 16, false),)), $this); ?>
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
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['root']; ?>
libs/js/prototype.js"></script>
		<script type="text/javascript" src="<?php echo $this->_tpl_vars['root']; ?>
libs/js/smarty_ajax.js"></script>
	</head>

	<body <?php if ($this->_tpl_vars['cur_page'] == main): ?>onLoad="<?php echo smarty_function_ajax_update(array('update_id' => 'tree_container','function' => 'select_subtree','params' => "id=0"), $this);?>
"<?php endif; ?>>
		<noscript>
			<div id="js_alert">Ваш браузер не поддерживает Javascript. Некоторые функции сайта будут недоступны!</div>
		</noscript>

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

			<div class="content-wrapper">
				<?php echo $this->_tpl_vars['both']; ?>

				<div class="left-area">
					<?php echo $this->_tpl_vars['left']; ?>

				</div>
				<div class="right-area">
					<?php echo $this->_tpl_vars['right']; ?>

				</div>
			</div>

			<div class="footer-area">
			</div>

		</div>
	</body>
</html>