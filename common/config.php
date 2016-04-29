<?php
	$host = "localhost:8888";
	$db_host="localhost:8889";
	$db_user="root";
	$db_pass="root";
	$db_name="kaktus";
	$report_errors=1;

	$root="http://localhost:8888/kaktus2013/";
	$root_abs="/Applications/MAMP/htdocs/kaktus2013/";
	$kl_spaw_root="http://localhost:8888/kaktus2013/";

	// $host = "localhost";
	// $db_host="localhost";
	// $db_user="kaktusco";
	// $db_pass="v3mnPH2LuvbTvMb2";
	// $db_name="kaktusco";
	// $report_errors=1;

	// $root="http://kaktus.co/";
	// $root_abs="/var/www/kaktus.co/";
	// $kl_spaw_root="http://kaktus.co/";

	$spawik_kl='/kaktus';

	//$kl_spaw_root='http://'.$_SERVER['HTTP_HOST'].'/;

	$db_prefics="kaktus_";

	$max_count=5;

	$photos_number=10;
	$obj_on_page=10;
	$langs=array('ru');
	$langs_content=array('pages'=>array('menue','title','text','keywords','meta_descr'),
						'objects'=>array('title','short_descr','long_descr'),
						'news'=>array('title','short_descr','long_descr'),);


	$admin=array('pictures_num'=>15,
				 'objects_num'=>15,
				 'kml_num'=>15,
				 'files_num'=>150,);
	$page_types=array(
					  array('name'=>'Обычная страница',
					  'link'=>'page.php'),
					  array('name'=>'Страница с портфолио',
					  'link'=>'portfolio.php'),
					  );
	$image_size=array(
		'page_image'=>array(
			'image_big'=>array('width'=>900,
					 	'height'=>600,
					 	'scale'=>0),//'scale'=>0 масштабировать изображение; 'scale'=>1 НЕ масштабировать изображение
			'image_small'=>array('width'=>210,
					   'height'=>140,
					   'scale'=>0),//'scale'=>0 масштабировать изображение; 'scale'=>1 НЕ масштабировать изображение
			'image_prev'=>array('width'=>60,
					   'height'=>40,
					   'scale'=>1),//'scale'=>0 масштабировать изображение; 'scale'=>1 НЕ масштабировать изображение
						),
		'page_icon'=>array(
			'image_big'=>array('width'=>210,
					 	'height'=>140,
					 	'scale'=>0),//'scale'=>0 масштабировать изображение; 'scale'=>1 НЕ масштабировать изображение
			'image_small'=>array('width'=>180,
					   'height'=>120,
					   'scale'=>0),//'scale'=>0 масштабировать изображение; 'scale'=>1 НЕ масштабировать изображение
			'image_prev'=>array('width'=>60,
					   'height'=>40,
					   'scale'=>0),//'scale'=>0 масштабировать изображение; 'scale'=>1 НЕ масштабировать изображение
						),
					  );
	$parameters=array(
		'pages'=>array(	'main'=>array('name'=>'main',
									'descr'=>'Главная',
									'type'=>'checkbox',
									'default'=>'0'),
						'is_shown'=>array('name'=>'is_shown',
									'descr'=>'Отображать на сайте',
									'type'=>'checkbox',
									'default'=>'1'),
						'descr_page'=>array('name'=>'descr_page',
									'descr'=>'Описание альбома',
									'type'=>'text',
									'default'=>''),
						'data_album'=>array('name'=>'data_album',
									'descr'=>'Дата фотосъемки',
									'type'=>'text',
									'default'=>'')
					 ),

					);

?>
