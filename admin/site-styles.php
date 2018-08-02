<?php
function css_in_footer(){
// Value from Color Picker nav_hover_background
$theme_color = get_option('eduking_theme_color');
$theme_second_color = get_option('eduking_theme_second_color');
$body_background_image = get_option('eduking_body_background_image');
$body_background_color = get_option('eduking_body_background_color');
$nav_background_color = get_option('eduking_nav_background_color');
$nav_font_color = get_option('eduking_nav_font_color');
$nav_hover_font_color = get_option('eduking_nav_hover_font_color');
$top_bar_font_color = get_option('eduking_top_bar_font_color');
$announcement_background = get_option('eduking_announcement_background');
$announcement_shadow = get_option('eduking_announcement_shadow');
$footer_background = get_option('eduking_footer_background');
$footer_font_color = get_option('eduking_footer_font_color');
$page_title_background = get_option('eduking_page_title_background');
$page_title_font = get_option('eduking_page_title_font');
?>
<style type='text/css'>
body {background: url(<?php echo $body_background_image; ?>) <?php echo $body_background_color; ?>; padding-top: 72px; }
.top-bar .top-bar-section li:not(.has-form) a:not(.button):hover, .top-bar-section ul li:hover > a, .header-bar, .post-date, .tribe-events-single-section-title, button, .button, .eduKING-search, .tribe-events-calendar thead th, #tribe-bar-form .tribe-bar-submit input[type=submit], .tribe-events-calendar td.tribe-events-present div[id*="tribe-events-daynum-"], #showoff-CSNDJHFUDO .showoff-categories a, .showoff-categories a { background: <?php echo $theme_color; ?> !important;}
.tribe-events-list-widget-events i { color: <?php echo $theme_color; ?> !important;}
.eduKING-search:hover, #tribe-bar-form .tribe-bar-submit input[type=submit]:hover, #showoff-NMEODGMDVM .showoff-categories a.active, .showoff-categories a.active {background: <?php echo $theme_second_color; ?> !important;}
.header-bar a:hover, #sidebar .panel a:hover, .footer-widget .panel a:hover {color: <?php echo $theme_second_color; ?> !important;}
.contain-to-grid, .top-bar, .top-bar-section ul, .top-bar-section li:not(.has-form) a:not(.button), .top-bar-section ul li > a {background: <?php echo $nav_background_color; ?>;}
.top-bar .top-bar-section ul li > a {color: <?php echo $nav_font_color; ?>;}
.header-bar-menu, .header-bar-menu a, .header-bar-left, .header-email {color: <?php echo $top_bar_font_color; ?> !important;}
.ribbon-front {background: <?php echo $announcement_background; ?>;}
.ribbon-edge-topleft, .ribbon-edge-bottomleft {border-color: transparent <?php echo $announcement_shadow; ?> transparent transparent;}
.announcement-text i {background: <?php echo $announcement_shadow; ?>;}
.single-tribe_events .tribe-events-venue-map { border: 4px solid <?php echo $theme_color; ?> !important; padding: 0 !important;}
.top-bar .top-bar-section li:not(.has-form) a:not(.button):hover, .top-bar-section ul li:hover > a, .header-bar, .post-date, .tribe-events-single-section-title, button, .button, .eduKING-search, .tribe-events-calendar thead th, #tribe-bar-form .tribe-bar-submit input[type=submit] {background:<?php echo $theme_color; ?> !important; }
.tribe-events-single-section-title { border-left: 3px solid <?php echo $theme_second_color; ?>; }
.top-bar-section li:not(.has-form) a:not(.button):hover, .top-bar-section ul li:hover > a {color: <?php echo $nav_hover_font_color; ?>;}
.footer-widget {background: <?php echo $footer_background; ?>; color: <?php echo $footer_font_color; ?>;}
.entry-title-box {background: <?php echo $page_title_background; ?>;}
.entry-title-box h1 { color: <?php echo $page_title_font; ?>;}
</style>
<?php
}
add_action('wp_footer','css_in_footer');
?>