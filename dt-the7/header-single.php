<?php
/**
 * The Header for single posts.
 *
 * Do not content header-main-content-open template part!
 *
 * @package vogue
 * @since vogue 1.0.0
 */

// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ancient-ie old-ie no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ancient-ie old-ie no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="old-ie no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="old-ie9 no-js" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if ( presscore_responsive() ) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php endif; // is responsive?>
	<?php if ( dt_retina_on() ) { dt_core_detect_retina_script(); } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
     <link rel="shortcut icon" type="image/png" href="https://www.cooverlaw.com/wp-content/uploads/2016/03/Favicon-16x16.png"/>
	<!--[if IE]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php
	// tracking code
	if ( ! is_preview() ) {
		echo of_get_option('general-tracking_code', '');
	}

	wp_head(); ?>
	
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5S6F74"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5S6F74');</script>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LN68SVKW2Y"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-LN68SVKW2Y');
</script>
</head>
<!-- Google Tag Manager -->


<?php
if(is_page(3036)){
if ( wp_is_mobile() ) {
    /* Display and echo mobile specific stuff here */
}else{ ?>
  <style type="text/css">
    div#main .wf-wrap{background-repeat:no-repeat;background-image:url(/wp-content/uploads/2019/03/CLF-Website-Slidern-Photo-03.jpg);background-size:contain;width:100%;height:100%;opacity:1;visibility:inherit;z-index:20}
  </style>

<?php } }
?>


<!-- End Google Tag Manager -->
<body <?php body_class(); ?>>



<?php do_action( 'presscore_body_top' ); ?>

<?php $config = presscore_get_config(); ?>

<div id="page"<?php if ( 'boxed' == $config->get( 'template.layout' ) ) echo ' class="boxed"'; ?>>

<?php
if ( presscore_is_content_visible() && $config->get( 'template.footer.background.slideout_mode' ) ) {
	echo '<div class="page-inner">';
}
?>

<?php if ( apply_filters( 'presscore_show_header', true ) ) : ?><!-- left, center, classic, side -->

	<?php dt_get_template_part( 'header/header', of_get_option( 'header-layout', 'left' ) ); ?>

<?php endif; // presscore_show_header ?>