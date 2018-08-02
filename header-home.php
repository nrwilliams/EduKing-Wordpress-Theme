<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<?php $header_number = get_option('eduking_favicon'); ?> 
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/<?php echo $favicon;  ?>">	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/eduking.css">
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/tribe-events/events.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Josefin+Sans:600,700' rel='stylesheet' type='text/css'>

<style>
 <?php
		$custom_css = get_option('eduking_custom_css');
                echo $custom_css;
				?>
</style>

<?php wp_head(); ?>
        <script>            
			jQuery(document).ready(function() {
				var offset = 220;
				var duration = 500;
				jQuery(window).scroll(function() {
					if (jQuery(this).scrollTop() > offset) {
						jQuery('.back-to-top').fadeIn(duration);
					} else {
						jQuery('.back-to-top').fadeOut(duration);
					}
				});
				
				jQuery('.back-to-top').click(function(event) {
					event.preventDefault();
					jQuery('html, body').animate({scrollTop: 0}, duration);
					return false;
				})
			});
		</script>




<script>
jQuery(document).ready(function($) {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 200 && $(window).innerWidth() >= 751) { 
            $('.top-bar-section li:not(.has-form) a:not(.button)').css("line-height", 4.9);
            $('.top-bar .name h1').css("line-height", 3.2);
            $('.title-area img').css("max-width", 150);

        }

        else if ($(window).scrollTop() >= 0 && $(window).innerWidth() <= 750){
            $('.top-bar-section li:not(.has-form) a:not(.button)').css("line-height", 1);
            $('.top-bar .name h1').css("line-height", 1);
            $('.title-area img').css("max-width", 150);

 }

else if ($.browser.mozilla && $(window).scrollTop() >= 0 && $(window).innerWidth() >= 751){ 
            $('.top-bar-section li:not(.has-form) a:not(.button)').css("line-height", 6.4);
            $('.top-bar .name h1').css("line-height", 4.6);
            $('.title-area img').css("max-width", 219);

        }

        else{
            $('.top-bar-section li:not(.has-form) a:not(.button)').css("line-height", 5.6);
            $('.top-bar .name h1').css("line-height", 4);
            $('.title-area img').css("max-width", 219);

 }

    });


});
</script>

</head>

<body <?php body_class('antialiased'); ?>>
<a href="#" class="back-to-top"><i class="fa fa-angle-up fa-2x"></i></a>


<?php $hide_header_bar = get_option('eduking_hide_header_bar'); ?>
<?php if ($hide_header_bar == "true") {
					echo '<div style="display:none">'; 
					} else { 
					echo '<div class="header-bar">';
					}
				?>

<div class="container" role="document">
	<div class="row">
<div class="small-12 medium-6 large-6 columns header-bar-left">
<i class="fa fa-phone"></i> <?php
				$header_number = get_option('eduking_header_number');
                echo $header_number;  ?> | <?php $header_email = get_option('eduking_header_email'); ?><i class="fa fa-envelope"></i> <a class="header-email" href="mailto:<?php echo $header_email ?>"><?php $header_email = get_option('eduking_header_email');
                echo $header_email;  ?></a>
</div>
<span class="header-bar-menu"><?php get_sidebar('header-bar'); ?></span>
</div></div></div>

<header class="contain-to-grid">

	<!-- Starting the Top-Bar -->
	<nav class="top-bar" data-topbar>
	    <ul class="title-area">
	        <li class="name">
	        	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php $logo = get_option('eduking_logo'); echo '<img src="'.$logo.'">';?></a></h1>
	        </li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	    </ul>
	    <section class="top-bar-section">
	    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="right">%3$s</ul>',
	            'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li',
	                'menu_type' => 'main-menu'
	            ) ),
	        ) );
	    ?>
	    <?php
	    	// Uncomment the following to enable the right menu (additional menu)
			
	    	/*
	        wp_nav_menu( array(
	            'theme_location' => 'additional',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="right">%3$s</ul>',
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li',
	                'menu_type' => 'main-menu'
	            ) ),
	        ) );
	        */
	    ?>
	    </section>
	</nav>
	<!-- End of Top-Bar -->
</header>

<!-- Start the main container -->
<div class="container" role="document">
	<div class="row">


                <?php
				
				$announcement = get_option('eduking_announcement');
                                $announcement_text = get_option('eduking_announcement_text');
				
				if ($announcement == "true") {
					echo '<div class="ribbon-wrapper">
		<div class="ribbon-front">
			<div class="announcement-text"><i class="fa fa-exclamation fa-spin"></i>'.$announcement_text.'</div>
		</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright"></div>
		<div class="ribbon-edge-bottomleft"></div>
		<div class="ribbon-edge-bottomright"></div>
		<div class="ribbon-back-right"></div>
	</div>'; 
					} else { 
					echo '';
					}
				?>
                