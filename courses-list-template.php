<?php
/*
Template Name: Courses-List
*/
get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main" style="margin-top: 27px; padding: 1.125rem 1.125rem 1.125rem 0;">
	
<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; // End the loop ?>

<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
    <input style="width: 50%;" id="search-custom-posts" class="search-input" type="search" name="s" placeholder="Enter course title...">
    <input type="hidden" name="post_type" value="course" />
    <button style="padding: 10px; font-size: .8rem; " class="search-submit" type="submit" role="button">Search Courses</button>
</form>



<?php
	$get_current_cat = get_term_by('name', single_cat_title('',false), 'category');
	$current_cat = $get_current_cat->term_id;


	// List posts by the terms for a custom taxonomy of any post type
	$post_type = 'course';
	$tax = 'courses_category';
	$tax_terms = get_terms( $tax, 'orderby=name&order=ASC');
	if ($tax_terms) {
		foreach ($tax_terms  as $tax_term) {
			$args = array(
				'post_type'			=> $post_type,
				"$tax"				=> $tax_term->slug,
				'post_status'		=> 'publish',
				'posts_per_page'	=> -1
			);

			$my_query = null;
			$my_query = new WP_Query($args);

			if( $my_query->have_posts() ) : ?>

				<div class="clearfix" style="margin-bottom: 30px; ">
					<h1 style="font-weight: bold; font-size: 1.3rem; "><?php echo $tax_term->name; ?></h1>
<div class="course">
<table>
<thead>
<tr>
<th>Course ID</th>
<th>Course</th>
<th>Professor</th>
<th>Time</th>
<th>Location</th>
</tr>
</thead>
					<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

						<?php $term_list = wp_get_post_terms($post->ID, 'category', array("fields" => "ids")); ?>


<tr>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_course_id', true );?></td>
<td><i class="fa fa-bookmark" style="color:#e74c3c;"></i> <a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_professor', true );?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_time_first', true );?> - <?php echo get_post_meta( get_the_ID(), 'wpshed_time_second', true );?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_location', true );?></td>
</tr>


					<?php endwhile; // end of loop ?>
</table>
</div>
				</div>

			<?php endif; // if have_posts()

			wp_reset_query();

		} // end foreach #tax_terms
	} // end if tax_terms
?>




</div>

<div  style="margin-top: 27px;">
<?php get_sidebar(); ?>
</div>	
		
<?php get_footer(); ?>

