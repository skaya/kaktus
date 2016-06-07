<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Профессиональный фотограф Konopatskaya Yuliya (KAKTUS)</title>
    <meta name="description" content="{$page.meta_descr}"/>
    <meta name="keywords" content="{$page.keywords}"/>

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

    <link rel="stylesheet" type="text/css" href="assets/stylesheets/sidebarNavigation.css" />
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
	<div id="menu-img">
		<div id="menu-img-left">
			<div id="menu-img-content">
				{include file="drop_down_menue.tpl"}
			</div>
        </div>
    </div>



    <div class="textContent content">
        <div class="textContent__inner">
            <h2>{$title}</h2>
            {$text}
	    </div>
    </div>



    <div class="sidebar-navigation">
        {$selected_menue}
    </div>


    {$contact_form}



    <div id="copyright">{$extra.footer}</div>
</div>

</body>
</html>
