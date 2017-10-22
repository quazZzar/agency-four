<?php get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="subPageLeft col-md-<?php echo is_active_sidebar( 'staff-sidebar' ) ? 8 : 12; ?>">
				<?php if(have_posts()) :
					while(have_posts()) : the_post();  
						$staff_options = get_post_meta(get_the_ID(), '_staff_options', true); 
						if(has_post_thumbnail()) : ?>
							<div class="col-sm-3">
							<img src="<?php the_post_thumbnail_url('staff-single'); ?>">	
							</div>
						<?php endif; ?>
						<div class="col-sm-<?php echo has_post_thumbnail() ? 9 : 12; ?>">
							<h1 class="staff_member_name"><?php the_title(); ?></h1>
							<?php if($staff_options['staff_email']) : ?>
								<p class="staff_email"><i class="fa fa-envelope"></i> <span>Email: </span><?php echo @$staff_options['staff_email']; ?></p>
							<?php endif; ?>
							<div class="team_member_description">
								<?php the_content(); ?>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
			<?php if (is_active_sidebar( 'staff-sidebar' )): ?>
				<div class="subPageRight col-md-4">
					<?php dynamic_sidebar('staff-sidebar'); ?>	
				</div>  
			<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>