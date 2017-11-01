<?php 
/**
 * Template Name: About Page
 */ 
 get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="subPageLeft col-md-<?php echo is_active_sidebar( 'about-page-sidebar' ) ? 8 : 12; ?>">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();
						the_content(); 
					endwhile;
				endif; ?>
			</div>
		
			<?php if (is_active_sidebar( 'about-page-sidebar' )): ?>
				<div class="subPageRight col-md-4">
					<?php dynamic_sidebar('about-page-sidebar'); ?>
				</div>  
			<?php endif; ?>	
		</div>
	</div>
<?php get_footer(); ?>