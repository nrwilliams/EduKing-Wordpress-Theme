<?php
/*
Template Name: Home
*/
get_header('home'); ?>

<?php 
$slider_id = get_option('eduking_slider_id'); 
$hide_slider = get_option('eduking_hide_slider');
?>

<?php if ($hide_slider == "true") {
					echo '<div style="display:none">'; 
					} else { 
					echo '<div class="slider">';
					}
				?>


<?php echo do_shortcode('[layerslider id="'.$slider_id.'"]'); ?>
</div>

<?php get_template_part( 'service-boxes' ); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" style="padding-left: 0; padding-right: 0;">
	<div class="small-12 large-12 columns" role="main" style="-webkit-box-shadow: -2px 2px 3px 0px rgba(0,0,0,0.18);
-moz-box-shadow: -2px 2px 3px 0px rgba(0,0,0,0.18);
box-shadow: -2px 2px 3px 0px rgba(0,0,0,0.18); background: #fff; padding: 1.585rem 1.985rem;margin-bottom: 23px;">

	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header style="display: none">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>
</div>
	<div class="small-12 large-12 columns" role="main" style=" padding: 0;">
<?php get_sidebar('home-main'); ?>
</div>
</div>


	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>
