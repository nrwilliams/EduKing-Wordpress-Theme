	</div><!-- Row End -->
</div><!-- Container End -->

<div class="full-width footer-widget">
	<div class="row">
		<?php dynamic_sidebar("Footer"); ?>
	</div>
</div>

<footer style="background: #494950; color: #E4E4E4; ">
<div class="row">
	<div class="small-12 large-12 columns footbar" role="main" style="background: none;">
<?php dynamic_sidebar('Footbar'); ?>

</div>
</div>
</footer>

<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>

	
</body>
</html>