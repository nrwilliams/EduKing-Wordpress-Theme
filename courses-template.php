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

<?php 
  $temp = $wp_query; 
  $wp_query = null; 
  $wp_query = new WP_Query(); 
  $wp_query->query('showposts=6&post_type=course'.'&paged='.$paged); 

  while ($wp_query->have_posts()) : $wp_query->the_post(); 
?>

<tbody>
<tr>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_course_id', true );?></td>
<td><i class="fa fa-bookmark" style="color:#e74c3c;"></i> <a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_professor', true );?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_time_first', true );?> - <?php echo get_post_meta( get_the_ID(), 'wpshed_time_second', true );?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_location', true );?></td>
</tr>
</tbody>


<?php endwhile; ?>

<nav>
    <?php previous_posts_link('&laquo; Newer') ?>
    <?php next_posts_link('Older &raquo;') ?>
</nav>

<?php 
  $wp_query = null; 
  $wp_query = $temp;  // Reset
?>


</table></div>
	</div>
<div  style="margin-top: 27px;">
<?php get_sidebar(); ?>
</div>	
		
<?php get_footer(); ?>

