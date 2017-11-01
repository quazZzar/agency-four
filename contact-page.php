<?php
/**
 * Template Name: Contact Page
 */ 

 get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="subPageLeft col-md-<?php echo is_active_sidebar( 'contact-page-sidebar' ) ? 8 : 12; ?>">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();
						the_content(); 
						if (is_active_sidebar( 'contact-form-sidebar' )): ?>
							<div class="sidebar-bellow-content">
								<?php dynamic_sidebar('contact-form-sidebar'); ?>
							</div>
						<?php endif;
					endwhile;
				endif; ?>
			</div>
			<?php if (is_active_sidebar( 'contact-page-sidebar' )): ?>
				<div class="subPageRight col-md-4">
					<?php dynamic_sidebar('contact-page-sidebar'); ?>
				</div>  
			<?php endif; ?>	
		</div>
	</div>
<?php get_footer(); ?>