<?php
/**
 * Template Name: Contact Page
 */ 

 get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="subPageLeft col-md-8">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();
						the_content(); 
						if (is_active_sidebar( 'contact-form-sidebar' )):
							dynamic_sidebar('contact-form-sidebar');
						endif;
					endwhile;
				endif; ?>
			</div>
			<div class="subPageRight col-md-4">
				<?php if (is_active_sidebar( 'contact-page-sidebar' )):
					dynamic_sidebar('contact-page-sidebar');
				endif; ?>	
			</div>  
		</div>
	</div>
<?php get_footer(); ?>