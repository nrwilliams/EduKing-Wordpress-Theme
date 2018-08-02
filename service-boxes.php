
<?php 
$hide_service_home = get_option('eduking_hide_service_home');
$service_link_1 = get_option('eduking_service_link_1');  
$service_icon_1 = get_option('eduking_service_icon_1');
$service_h2_1 = get_option('eduking_service_h2_1');
$service_h4_1 = get_option('eduking_service_h4_1');
$service_color_main_1 = get_option('eduking_service_color_main_1');
$service_color_hover_1 = get_option('eduking_service_color_hover_1');
$service_font_color_1 = get_option('eduking_service_font_color_1');
$service_link_2 = get_option('eduking_service_link_2');  
$service_icon_2 = get_option('eduking_service_icon_2');
$service_h2_2 = get_option('eduking_service_h2_2');
$service_h4_2 = get_option('eduking_service_h4_2');
$service_color_main_2 = get_option('eduking_service_color_main_2');
$service_color_hover_2 = get_option('eduking_service_color_hover_2');
$service_font_color_2 = get_option('eduking_service_font_color_2');
$service_link_3 = get_option('eduking_service_link_3');  
$service_icon_3 = get_option('eduking_service_icon_3');
$service_h2_3 = get_option('eduking_service_h2_3');
$service_h4_3 = get_option('eduking_service_h4_3');
$service_color_main_3 = get_option('eduking_service_color_main_3');
$service_color_hover_3 = get_option('eduking_service_color_hover_3');
$service_font_color_3 = get_option('eduking_service_font_color_3');
$service_link_4 = get_option('eduking_service_link_4');  
$service_icon_4 = get_option('eduking_service_icon_4');
$service_h2_4 = get_option('eduking_service_h2_4');
$service_h4_4 = get_option('eduking_service_h4_4');
$service_color_main_4 = get_option('eduking_service_color_main_4');
$service_color_hover_4 = get_option('eduking_service_color_hover_4');
$service_font_color_4 = get_option('eduking_service_font_color_4');
?>

				<?php if ($hide_service_home == "true") {
					echo '<div style="margin-bottom: 37px; "></div><div style="display:none">'; 
					} else { 
					echo '<div style="margin-bottom: 37px; height: 94px;">';
					}
				?>
			
<div class="small-12 medium-6 large-3 columns"> 
<a href="<?php echo $service_link_1; ?>">
<div class="home-service" style="background:<?php  echo $service_color_main_1; ?>" onMouseover="style.backgroundColor='<?php  echo $service_color_hover_1; ?>';" onMouseout="style.backgroundColor='<?php  echo $service_color_main_1; ?>';">
<div class="home-service-icon" style="background:<?php  echo $service_color_main_1; ?>"><i style="color: <?php echo $service_font_color_1; ?> !important;" class="fa fa-<?php echo $service_icon_1; ?> fa-2x"></i></div>
<div class="home-service-text">
<h4 style="color: <?php echo $service_font_color_1; ?> !important;"><?php echo $service_h2_1; ?></h4>
<h2 style="color: <?php echo $service_font_color_1; ?> !important;"><?php echo $service_h4_1; ?></h2>
</div>
</div></a>
</div>


<div class="small-12 medium-6 large-3 columns"> 
<a href="<?php echo $service_link_2; ?>">
<div class="home-service" style="background:<?php  echo $service_color_main_2; ?>" onMouseover="style.backgroundColor='<?php  echo $service_color_hover_2; ?>';" onMouseout="style.backgroundColor='<?php  echo $service_color_main_2; ?>';">
<div class="home-service-icon" style="background:<?php  echo $service_color_main_2; ?>"><i style="color: <?php echo $service_font_color_2; ?> !important;" class="fa fa-<?php echo $service_icon_2; ?> fa-2x"></i></div>
<div class="home-service-text">
<h4 style="color: <?php echo $service_font_color_2; ?> !important;"><?php echo $service_h2_2; ?></h4>
<h2 style="color: <?php echo $service_font_color_2; ?> !important;"><?php echo $service_h4_2; ?></h2>
</div>
</div></a>
</div>

<div class="small-12 medium-6 large-3 columns"> 
<a href="<?php echo $service_link_3; ?>">
<div class="home-service" style="background:<?php  echo $service_color_main_3; ?>" onMouseover="style.backgroundColor='<?php  echo $service_color_hover_3; ?>';" onMouseout="style.backgroundColor='<?php  echo $service_color_main_3; ?>';">
<div class="home-service-icon" style="background:<?php  echo $service_color_main_3; ?>"><i style="color: <?php echo $service_font_color_3; ?> !important;  " class="fa fa-<?php echo $service_icon_3; ?> fa-2x"></i></div>
<div class="home-service-text">
<h4 style="color: <?php echo $service_font_color_3; ?> !important;"><?php echo $service_h2_3; ?></h4>
<h2 style="color: <?php echo $service_font_color_3; ?> !important;"><?php echo $service_h4_3; ?></h2>
</div>
</div></a>
</div>

<div class="small-12 medium-6 large-3 columns"> 
<a href="<?php echo $service_link_4; ?>">
<div class="home-service" style="background:<?php  echo $service_color_main_4; ?>" onMouseover="style.backgroundColor='<?php  echo $service_color_hover_4; ?>';" onMouseout="style.backgroundColor='<?php  echo $service_color_main_4; ?>';">
<div class="home-service-icon" style="background:<?php  echo $service_color_main_4; ?>"><i style="color: <?php echo $service_font_color_4; ?> !important;" class="fa fa-<?php echo $service_icon_4; ?> fa-2x"></i></div>
<div class="home-service-text">
<h4 style="color: <?php echo $service_font_color_4; ?> !important;"><?php echo $service_h2_4; ?></h4>
<h2 style="color: <?php echo $service_font_color_4; ?> !important;"><?php echo $service_h4_4; ?></h2>
</div>
</div></a>
</div>
</div>