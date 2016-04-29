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
		<script type="text/javascript" src="{$root}libs/js/prototype.js"></script>
		<script type="text/javascript" src="{$root}libs/js/smarty_ajax.js"></script>
	</head>

	<body {if $cur_page==main}onLoad="{ajax_update update_id="tree_container" function="select_subtree" params="id=0"}"{/if}>
		<noscript>
			<div id="js_alert">Ваш браузер не поддерживает Javascript. Некоторые функции сайта будут недоступны!</div>
		</noscript>

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

			<div class="content-wrapper">
				{$both}
				<div class="left-area">
					{$left}
				</div>
				<div class="right-area">
					{$right}
				</div>
			</div>

			<div class="footer-area">
			</div>

		</div>
	</body>
</html>
