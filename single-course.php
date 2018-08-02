<?php get_header(); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main" id="content" style="margin-top: 26px;">
	
<?php if(have_posts()): while(have_posts()): the_post(); ?>


<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail();
} 
?>
<div class="course">
<table width="100%">
<thead>
<tr>
<td>Course ID</td>
<td>Course</td>
<td>Professor</td>
<td>Time</td>
<td>Location</td>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_course_id', true );?></td>
<td><i class="fa fa-bookmark" style="color:#e74c3c;"></i> <?php the_title(); ?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_professor', true );?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_time_first', true );?> - <?php echo get_post_meta( get_the_ID(), 'wpshed_time_second', true );?></td>
<td><?php echo get_post_meta( get_the_ID(), 'wpshed_location', true );?></td>
</tr>
</tbody>
</table></div><br>
<?php the_content(); ?>

<?php endwhile; endif; ?><hr>
<div class="course-comment">
<?php comment_form(); ?>
  </div>
	</div>
<div style="margin-top: 26px">
	<?php get_sidebar(); ?>
		</div>

<?php get_footer(); ?>