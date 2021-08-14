<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
<meta name="keywords" content="education,school,university,educational,learn,learning,teaching,workshop" />
<meta name="author" content="Magical Target Information Technology" />

<!-- Page Title -->
<title>
    <?php echo $__env->yieldContent('meta-title'); ?>
    <?php echo app('translator')->getFromJson('site.siteName'); ?>
</title>

<!-- Favicon and Touch Icons -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/favicon.png" rel="shortcut icon" type="image/png">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?php echo e(request()->root()); ?>/public/fonts/tajawal/tajawal.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<?php if($lang == 1): ?>
    <link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
<?php endif; ?>
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/menuzord-megamenu.css" rel="stylesheet"/>
<?php if($lang == 1): ?>
    <link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/menuzord-megamenu-rtl.css" rel="stylesheet"/>
<?php endif; ?>
<link id="menuzord-menu-skins" href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/<?php echo e(__('site.getContent',['ar'=>'style-main-rtl','en'=>'style-main'])); ?>.css" rel="stylesheet" type="text/css">
<?php if($lang == 1): ?>
    <link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/style-main-rtl-extra.css" rel="stylesheet" type="text/css">
<?php endif; ?>
<!-- CSS | Preloader Styles -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?php echo e(request()->root()); ?>/public/assets/learnpro/css/colors/theme-skin-color-qunv2.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/jquery-2.2.4.min.js"></script>
<!-- <script src="<?php echo e(request()->root()); ?>/public/assets/assets/plugins/jquery/jquery-3.3.1.min.js"></script> -->

<script src="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/jquery-ui.min.js"></script>
<script src="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo e(request()->root()); ?>/public/assets/learnpro/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->