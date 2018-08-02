<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main" style="margin-top: 26px;">
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title" style="margin-bottom: 1rem; font-weight: bold; font-size: 1.75rem;"><?php the_title(); ?></h1>
<span style="display: inline-block; font-size: 12px; background:#f8f8f8;padding: 7px 12px;"><i class="fa fa-calendar-o" style="margin-right: 7px;"></i><?php the_date('F j, Y'); ?></span>  <span style="display: inline-block; font-size: 12px; background:#f8f8f8;padding: 7px 12px;"><i class="fa fa-user" style="margin-right: 7px;"></i><?php the_author(); ?></span>  <span style="margin-top: 5px; display: inline-block; font-size: 12px; background:#f8f8f8;padding: 7px 12px;"><i class="fa fa-comment" style="margin-right: 7px;"></i>Comments: <?php comments_number( '0', '1', '%' ); ?></span>
			</header><hr>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p class="entry-tags"><i class="fa fa-tag fa-flip-horizontal" style="margin-right: 7px;"></i><?php the_tags(); ?></p>
				<?php edit_post_link('Edit this Post'); ?>

			</footer>
		</article>
<div class="prev-next-buttons">
<?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> Older Posts', FALSE); ?>
<?php next_post_link('%link', 'Newer Posts <i class="fa fa-angle-right"></i>', FALSE); ?>
</div>
                <?php
				
				$blog_author = get_option('eduking_blog_author');
				
				if ($blog_author == "true") {
					echo '<div style="margin: 20px 0;"></div><div style="display:none;" class="entry-author panel">'; 
					} else { 
					echo '<div class="entry-author panel">';
					}
				?>

			<div class="row">
				<div class="large-2 columns">
					<?php echo get_avatar( get_the_author_meta('user_email'), 95 ); ?>
				</div>
				<div class="large-10 columns" style="padding-left: 31px;">
					<h4><?php the_author_posts_link(); ?></h4>
					<p class="cover-description"><?php the_author_meta('description'); ?></p>
				</div>
			</div>
		</div>
		<?php comments_template(); ?>

	<?php endwhile; // End the loop ?>

	</div>
<div style="margin-top: 26px">
	<?php get_sidebar(); ?>
		</div>
<?php get_footer(); ?>