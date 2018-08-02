<?php get_header('blog'); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main" style="margin-top: 26px; background: #fff;
padding: 0 26px 26px 26px;">
	


<?php 
$number_posts = get_option('eduking_number_posts');
query_posts($query_string . "&posts_per_page=$number_posts"); ?>

<?php if ( have_posts() ) : ?>
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

	<div class="posts">	

<div style="padding-top: 10px;">
<div class="post-meta">

<div class="post-date">
<?php the_time('j'); ?><br>
 </div><div class="post-month"><?php the_time('M'); ?></div>
</div>

<div class="post-content">

<div class="post-title">
<a href="<?php echo get_permalink(); ?>"> <?php the_title(); ?></a>
</div>
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
} 
?>
 <div class="post-excerpt">
<?php the_excerpt();?>
</div>
<i class="fa fa-user"></i><?php the_author(); ?> | 
<span style="text-transform: none; font-size:14px;"><i class="fa fa-comment"></i><a href="<?php comments_link(); ?>">Comments: <?php comments_number( '0', '1', '%' ); ?></a></span>

</div></div></div><hr>

			<?php get_template_part(); ?>
		<?php endwhile; ?>
		
		
	<?php endif; // end have_posts() check ?>	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
<div style="margin-top: 26px; ">
	<?php get_sidebar(); ?>
</div>
		
<?php get_footer(); ?>