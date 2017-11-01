<?php get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="subPageLeft col-md-<?php echo is_active_sidebar( 'main-sidebar' ) ? 8 : 12; ?>">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();
						the_content(); 
					endwhile;
				endif; ?>
			</div>
			<?php get_sidebar(); ?>	
		</div>
	</div>
<?php get_footer(); ?>