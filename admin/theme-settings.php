<?php

add_action('init','propanel_of_options');

if (!function_exists('propanel_of_options')) {
function propanel_of_options(){

//Theme Shortname
$shortname = "eduking";


//Populate the options array
global $tt_options;
$tt_options = get_option('of_options');


//Access the WordPress Pages via an Array
$tt_pages = array();
$tt_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($tt_pages_obj as $tt_page) {
$tt_pages[$tt_page->ID] = $tt_page->post_name; }
$tt_pages_tmp = array_unshift($tt_pages, "Select a page:"); 


//Access the WordPress Categories via an Array
$tt_categories = array();  
$tt_categories_obj = get_categories('hide_empty=0');
foreach ($tt_categories_obj as $tt_cat) {
$tt_categories[$tt_cat->cat_ID] = $tt_cat->cat_name;}
$categories_tmp = array_unshift($tt_categories, "Select a category:");


//Sample Array for demo purposes
$sample_array = array("1","2","3","4","5");


//Sample Advanced Array - The actual value differs from what the user sees
$sample_advanced_array = array("image" => "The Image","post" => "The Post"); 


//Folder Paths for "type" => "images"
$sampleurl =  get_template_directory_uri() . '/admin/images/sample-layouts/';










/*-----------------------------------------------------------------------------------*/
/* Create The Custom Site Options Panel
/*-----------------------------------------------------------------------------------*/
$options = array(); // do not delete this line - sky will fall




/* Option Page 1 - General */	
$options[] = array( "name" => __('General','framework_localize'),
			"type" => "heading");
			
$options[] = array(
			"name"	 => __('Site Settings','truethemes_localize'),
			"std"	 => __('These options are for the main Site.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Favicon','framework_localize'),
			"desc" => __('Upload an image (16 X 16) for the favicon.','framework_localize'),
			"id" => $shortname."_favicon",
			"std" => "",
			"type" => "upload");
			
$options[] = array(
			"name"	 => __('Body Settings','truethemes_localize'),
			"std"	 => __('These options target the main body of the website.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Body Background Image','framework_localize'),
			"desc" => __('Upload an image to be used as the background.','framework_localize'),
			"id" => $shortname."_body_background_image",
			"std" => "",
			"type" => "upload");

$options[] = array( "name" => __('Body Background Color','framework_localize'),
			"desc" => __('This is the color for the main body if no image is used. Default is #efefef.','framework_localize'),
			"id" => $shortname."_body_background_color",
			"std" => "#efefef",
			"type" => "color");

$options[] = array(
			"name"	 => __('Global Settings','truethemes_localize'),
			"std"	 => __('These options target major aspects throughout the entire theme.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Theme Primary Color','framework_localize'),
			"desc" => __('This is the main color for the website. Default is #1abc9c.','framework_localize'),
			"id" => $shortname."_theme_color",
			"std" => "#1abc9c",
			"type" => "color");

$options[] = array( "name" => __('Theme Secondary Color','framework_localize'),
			"desc" => __('This is the secondary color for the website i.e. button hover color, borders, and more. Default is #16a085.','framework_localize'),
			"id" => $shortname."_theme_second_color",
			"std" => "#16a085",
			"type" => "color");

			
$options[] = array(
			"name"  => __('Page Title','truethemes_localize'),
			"std"   => __('The options for the page title box that comes below the header.','truethemes_localize'),
			"class" => "heading-parent heading-parent-alt",
			"type"  => "info");	

$options[] = array( "name" => __('Disable Globally','framework_localize'),
			"desc" => __('Check this box to disable the page title on all pages.','framework_localize'),
			"id" => $shortname."_display_page_title",
			"std" => "false",
			"type" => "checkbox");

$options[] = array( "name" => __('Page Title Background','framework_localize'),
			"desc" => __('This is the background color for the page title box. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_page_title_background",
			"std" => "#ffffff",
			"type" => "color");

$options[] = array( "name" => __('Page Title Font Color','framework_localize'),
			"desc" => __('This is the font color for the page title box. Default is #333333.','framework_localize'),
			"id" => $shortname."_page_title_font",
			"std" => "#333333",
			"type" => "color");


/* Option Page 5 - Service Boxes */	
$options[] = array( "name" => __('Service&nbsp;Boxes','framework_localize'),
			"type" => "heading");	

$options[] = array(
			"name"	 => __('Enable/Disable Service Boxes','truethemes_localize'),
			"std"	 => __('Check the box to disable/enable the service boxes under the slider.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Disable Service Boxes','framework_localize'),
			"desc" => __('Check this box to hide the service boxes under the slider.','framework_localize'),
			"id" => $shortname."_hide_service_home",
			"std" => "false",
			"type" => "checkbox");

$options[] = array(
			"name"	 => __('Service Box 1','truethemes_localize'),
			"std"	 => __('Add the information for the first service box under the slider.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Link URL','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_link_1",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Icon','framework_localize'),
			"desc" => "Add the icon name for the button.",
			"id" => $shortname."_service_icon_1",
			"std" => "list",
			"type" => "text");

$options[] = array( "name" => __('First Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h2_1",
			"std" => "list of",
			"type" => "text");

$options[] = array( "name" => __('Second Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h4_1",
			"std" => "Courses",
			"type" => "text");

$options[] = array( "name" => __('Main Color','framework_localize'),
			"desc" => __('This is the main color for the service box. Default is #e74c3c.','framework_localize'),
			"id" => $shortname."_service_color_main_1",
			"std" => "#e74c3c",
			"type" => "color");

$options[] = array( "name" => __('Hover Color','framework_localize'),
			"desc" => __('This is the hover color for the service box. Default is #c0392b.','framework_localize'),
			"id" => $shortname."_service_color_hover_1",
			"std" => "#c0392b",
			"type" => "color");

$options[] = array( "name" => __('Font Color','framework_localize'),
			"desc" => __('This is the font color for the service box. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_service_font_color_1",
			"std" => "#ffffff",
			"type" => "color");




$options[] = array(
			"name"	 => __('Service Box 2','truethemes_localize'),
			"std"	 => __('Add the information for the second service box under the slider.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Link URL','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_link_2",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Icon','framework_localize'),
			"desc" => "Add the icon name for the button.",
			"id" => $shortname."_service_icon_2",
			"std" => "users",
			"type" => "text");

$options[] = array( "name" => __('First Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h2_2",
			"std" => "Faculty and",
			"type" => "text");

$options[] = array( "name" => __('Second Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h4_2",
			"std" => "Staff",
			"type" => "text");

$options[] = array( "name" => __('Main Color','framework_localize'),
			"desc" => __('This is the main color for the service box. Default is #2ecc71.','framework_localize'),
			"id" => $shortname."_service_color_main_2",
			"std" => "#2ecc71",
			"type" => "color");

$options[] = array( "name" => __('Hover Color','framework_localize'),
			"desc" => __('This is the hover color for the service box. Default is #27ae60.','framework_localize'),
			"id" => $shortname."_service_color_hover_2",
			"std" => "#27ae60",
			"type" => "color");

$options[] = array( "name" => __('Font Color','framework_localize'),
			"desc" => __('This is the font color for the service box. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_service_font_color_2",
			"std" => "#ffffff",
			"type" => "color");




$options[] = array(
			"name"	 => __('Service Box 3','truethemes_localize'),
			"std"	 => __('Add the information for the third service box under the slider.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Link URL','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_link_3",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Icon','framework_localize'),
			"desc" => "Add the icon name for the button.",
			"id" => $shortname."_service_icon_3",
			"std" => "calendar-o",
			"type" => "text");

$options[] = array( "name" => __('First Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h2_3",
			"std" => "Upcoming",
			"type" => "text");

$options[] = array( "name" => __('Second Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h4_3",
			"std" => "Events",
			"type" => "text");

$options[] = array( "name" => __('Main Color','framework_localize'),
			"desc" => __('This is the main color for the service box. Default is #3498db.','framework_localize'),
			"id" => $shortname."_service_color_main_3",
			"std" => "#3498db",
			"type" => "color");

$options[] = array( "name" => __('Hover Color','framework_localize'),
			"desc" => __('This is the hover color for the service box. Default is #2980b9.','framework_localize'),
			"id" => $shortname."_service_color_hover_3",
			"std" => "#2980b9",
			"type" => "color");

$options[] = array( "name" => __('Font Color','framework_localize'),
			"desc" => __('This is the font color for the service box. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_service_font_color_3",
			"std" => "#ffffff",
			"type" => "color");




$options[] = array(
			"name"	 => __('Service Box 4','truethemes_localize'),
			"std"	 => __('Add the information for the fourth service box under the slider.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Link URL','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_link_4",
			"std" => "",
			"type" => "text");

$options[] = array( "name" => __('Icon','framework_localize'),
			"desc" => "Add the icon name for the button.",
			"id" => $shortname."_service_icon_4",
			"std" => "camera",
			"type" => "text");

$options[] = array( "name" => __('First Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h2_4",
			"std" => "View our",
			"type" => "text");

$options[] = array( "name" => __('Second Line Heading','framework_localize'),
			"desc" => "Add the url for the button link.",
			"id" => $shortname."_service_h4_4",
			"std" => "Gallery",
			"type" => "text");

$options[] = array( "name" => __('Main Color','framework_localize'),
			"desc" => __('This is the main color for the service box. Default is #e67e22.','framework_localize'),
			"id" => $shortname."_service_color_main_4",
			"std" => "#e67e22",
			"type" => "color");

$options[] = array( "name" => __('Hover Color','framework_localize'),
			"desc" => __('This is the hover color for the service box. Default is #d35400.','framework_localize'),
			"id" => $shortname."_service_color_hover_4",
			"std" => "#d35400",
			"type" => "color");

$options[] = array( "name" => __('Font Color','framework_localize'),
			"desc" => __('This is the font color for the service box. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_service_font_color_4",
			"std" => "#ffffff",
			"type" => "color");

				


/* Option Page 2 - Header */
$options[] = array( "name" => __('Header','framework_localize'),
			"type" => "heading");

$options[] = array(
			"name"	 => __('Main Settings','truethemes_localize'),
			"std"	 => __('The main settings for the header.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Theme Logo','framework_localize'),
			"desc" => __('Upload an image to be used as the theme logo.','framework_localize'),
			"id" => $shortname."_logo",
			"std" => "",
			"type" => "upload");

$options[] = array(
			"name"	 => __('Navigation Settings','truethemes_localize'),
			"std"	 => __('These are the settings for the main navigation - i.e. colors.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Nav Bar Background','framework_localize'),
			"desc" => __('This is the main color for the navigation bar. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_nav_background_color",
			"std" => "#ffffff",
			"type" => "color");

$options[] = array( "name" => __('Nav Bar Font','framework_localize'),
			"desc" => __('This is the main color for the navigation bar font. Default is #333333.','framework_localize'),
			"id" => $shortname."_nav_font_color",
			"std" => "#333333",
			"type" => "color");

$options[] = array( "name" => __('Nav Hover Font Color','framework_localize'),
			"desc" => __('This is the font color for the header bar when hovered. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_nav_hover_font_color",
			"std" => "#ffffff",
			"type" => "color");


$options[] = array(
			"name"	 => __('Header Bar Options','truethemes_localize'),
			"std"	 => __('The options for the bar below the main navigation.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Disable Header Bar','framework_localize'),
			"desc" => __('Check this box to hide the header bar below the navigation.','framework_localize'),
			"id" => $shortname."_hide_header_bar",
			"std" => "false",
			"type" => "checkbox");

$options[] = array( "name" => __('Header Bar Email','framework_localize'),
			"desc" => "Add the email for the header bar underneath the navigation.",
			"id" => $shortname."_header_email",
			"std" => "email@email.com",
			"type" => "text");

$options[] = array( "name" => __('Header Bar Phone Number','framework_localize'),
			"desc" => "Add a phone number to be used in the header bar under the navigation.",
			"id" => $shortname."_header_number",
			"std" => "770-978-8596",
			"type" => "text");


$options[] = array( "name" => __('Font Color','framework_localize'),
			"desc" => __('This is the font color for the header bar. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_top_bar_font_color",
			"std" => "#ffffff",
			"type" => "color");



/* Option Page 5 - Footer */	
$options[] = array( "name" => __('Footer','framework_localize'),
			"type" => "heading");

$options[] = array(
			"name"	 => __('Footer Settings','truethemes_localize'),
			"std"	 => __('The main settings for the footer section containing the widgets.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Footer Background','framework_localize'),
			"desc" => __('This is the main color for the footer background. Default is #414147.','framework_localize'),
			"id" => $shortname."_footer_background",
			"std" => "#414147",
			"type" => "color");

$options[] = array( "name" => __('Footer Font Color','framework_localize'),
			"desc" => __('This is the font color for the footer. Default is #ffffff.','framework_localize'),
			"id" => $shortname."_footer_font_color",
			"std" => "#ffffff",
			"type" => "color");



/* Option Page 3 - Announcement */	
$options[] = array( "name" => __('Announcement','framework_localize'),
			"type" => "heading");


$options[] = array(
			"name"	 => __('Announcement Settings','truethemes_localize'),
			"std"	 => __('The main settings for the announcement banner.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Enable Announcement','framework_localize'),
			"desc" => __('Check this box to show the announcement banner.','framework_localize'),
			"id" => $shortname."_announcement",
			"std" => "false",
			"type" => "checkbox");

$options[] = array( "name" => __('Announcement','framework_localize'),
			"desc" => "Add your announcement text here!.",
			"id" => $shortname."_announcement_text",
			"std" => "Due to incliment weather, school is closed",
			"type" => "text");

$options[] = array( "name" => __('Main Banner Color','framework_localize'),
			"desc" => __('This is the main banner color.','framework_localize'),
			"id" => $shortname."_announcement_background",
			"std" => "#1abc9c",
			"type" => "color");	

$options[] = array( "name" => __('Shadow Color','framework_localize'),
			"desc" => __('This is the color for the small triangle shadow that goes on the bottom left of the banner.','framework_localize'),
			"id" => $shortname."_announcement_shadow",
			"std" => "#16a085",
			"type" => "color");	
		

				
/* Option Page 4 - Slider */	
$options[] = array( "name" => __('Slider','framework_localize'),
			"type" => "heading");	

$options[] = array(
			"name"	 => __('Homepage Slider Options','truethemes_localize'),
			"std"	 => __('Set the options for the slider that show up on the homepage template.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Disable Slider','framework_localize'),
			"desc" => __('Check this box to hide the slider on the homepage.','framework_localize'),
			"id" => $shortname."_hide_slider",
			"std" => "false",
			"type" => "checkbox");

$options[] = array( "name" => __('Slider ID','framework_localize'),
			"desc" => "Input the slider id number from the layerslider plugin slider creation.",
			"id" => $shortname."_slider_id",
			"std" => "1",
			"type" => "text");


/* Option Page 5 - Blog */	
$options[] = array( "name" => __('Blog','framework_localize'),
			"type" => "heading");

$options[] = array(
			"name"	 => __('Blog Settings','truethemes_localize'),
			"std"	 => __('Custom settings for the blog page.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");

$options[] = array( "name" => __('Number of Posts','framework_localize'),
			"desc" => "The number of posts to display on the blog page.",
			"id" => $shortname."_number_posts",
			"std" => "8",
			"type" => "text");

$options[] = array( "name" => __('Disable Blog Author','framework_localize'),
			"desc" => __('To disable the author section on the blog page, check this box.','framework_localize'),
			"id" => $shortname."_blog_author",
			"std" => "false",
			"type" => "checkbox");


/* Option Page 6 - Custom CSS */	
$options[] = array( "name" => __('Custom&nbsp;CSS','framework_localize'),
			"type" => "heading");

$options[] = array(
			"name"	 => __('Custom CSS','truethemes_localize'),
			"std"	 => __('Add custom css for the theme.','truethemes_localize'),
			"class"  => "heading-parent",
			"type"   => "info");


$options[] = array( "name" => __('Custom CSS','framework_localize'),
			"desc" => "Add custom css here for eduKING theme. Use !important after the style to overwrite certain styles.",
			"id" => $shortname."_custom_css",
			"std" => "",
			"type" => "textarea");
										
					


update_option('of_template',$options); 					  
update_option('of_shortname',$shortname);

}
}
?>