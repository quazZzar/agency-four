<?php /* Template Name: Full Width Page */
get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();
						the_content(); 
					endwhile;
				endif; ?>
			</div>
		
		</div>
	</div>
<?php get_footer(); ?>