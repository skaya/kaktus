<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{$page.title}</title>
    <meta name="description" content="{$page.meta_descr}"/>
    <meta name="keywords" content="{$page.keywords}"/>

    <script type="text/javascript" src="vendor/javascripts/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="vendor/javascripts/jquery-ui-1.8.17.min.js"></script>
    <script type="text/javascript" src="vendor/javascripts/jquery.mouseGallerySlide.1.2.0.js"></script><!-- scrolling for dropdown menu-->

    <script type="text/javascript" src="assets/javascripts/menuPhotoAnimate.js" ></script> <!-- for animate menu photo -->
    <script type="text/javascript" src="assets/javascripts/galleryNavigate.js"></script>
    <script type="text/javascript" src="assets/javascripts/layout.js"></script>

    <link rel="Stylesheet" type="text/css" href="assets/stylesheets/layout.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/form.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/style.css"/>

    <link rel="stylesheet" type="text/css" href="assets/stylesheets/contact_form.css" />
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/article_menu.css" />
    <link rel="Stylesheet" type="text/css" href="assets/stylesheets/scrollable_dropdown_menu.css" />

    <!--[if lte IE 8]>
        <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
    <![endif]-->
</head>
<body>
<div id="bg-left"></div>
<div id="bg-right"></div>
<div id="loading_page"></div>
<div id="bg-img">
<block name=content></block>
</div>
</body>
</html>
