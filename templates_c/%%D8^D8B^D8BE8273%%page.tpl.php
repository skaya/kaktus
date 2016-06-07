<?php /* Smarty version 2.6.12, created on 2016-06-07 08:02:20
         compiled from page.tpl */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Профессиональный фотограф Konopatskaya Yuliya (KAKTUS)</title>
    <meta name="description" content="Конопацкая Юлия - свадебный фотограф минск, профессиональный фотограф , фотографы минск, свадебные фотографы минска, свадебный фотограф в минске | Konopatskaya Yuliya - wedding professional photography Minsk"/>
    <meta name="keywords" content="профессиональный фотограф, свадебный фотограф, фотограф минск, фотограф брест"/>

    <script type="text/javascript" src="vendor/javascripts/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="vendor/javascripts/jquery-ui-1.8.17.min.js"></script>
    <script type="text/javascript" src="vendor/javascripts/jquery.mouseGallerySlide.1.2.0.js"></script><!-- scrolling for dropdown menu-->

    <script type="text/javascript" src="assets/javascripts/sliding_effect.js"></script>  <!--dop menu-->
    <script type="text/javascript" src="assets/javascripts/menuPhotoAnimate.js" ></script> <!-- for animate menu photo -->
    <script type="text/javascript" src="assets/javascripts/galleryNavigate.js"></script>
    <script type="text/javascript" src="assets/javascripts/layout.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/stylesheets/form.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/contactForm.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/textContent.css" />

    <link rel="stylesheet" type="text/css" href="assets/stylesheets/leftMenu.css" />
    <link rel="Stylesheet" type="text/css" href="assets/stylesheets/menuPhotoAnimate.css" />
    <link rel="Stylesheet" type="text/css" href="assets/stylesheets/all.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/style.css"/>

    <!--[if lte IE 8]>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
    <![endif]-->
</head>
<body>
<div id="bg-left"></div>
<div id="bg-right"></div>
<div id="loading_page"></div>
<div id="bg-img">
	<div id="back-menu">&nbsp;</div>
	<div id="menu-img" class=''>
		<div id="menu-img-left">
			<div id="menu-img-content">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "drop_down_menue.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</div>
        </div>
    </div>



    <div class="textContent content">
        <div class="textContent__inner">
            <h2><?php echo $this->_tpl_vars['title']; ?>
</h2>
            <?php echo $this->_tpl_vars['text']; ?>

	    </div>
    </div>

</div>


<?php echo $this->_tpl_vars['contact_form']; ?>


<?php echo $this->_tpl_vars['selected_menue']; ?>


<div id="copyright"><?php echo $this->_tpl_vars['extra']['footer']; ?>
</div>
<div id="copyright2"><?php echo $this->_tpl_vars['extra']['footer']; ?>
</div>

</body>
</html>