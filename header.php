<!DOCTYPE html>
<!--[if lt IE 7]>
    <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>
    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>
    <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="<?php bloginfo('charset'); ?>" />
	<?php $wl_theme_options = kadima_get_options(); ?>
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo esc_url($wl_theme_options['upload_image_favicon']); ?>" />
	<?php } ?>
	<link rel="dns-prefetch" href="//cdn.yunclever.com">
	<link rel="dns-prefetch" href="//cdn.bootcss.com">
	<link rel="dns-prefetch" href="//use.typekit.net">
	<link rel="dns-prefetch" href="//static.addtoany.com">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div>
