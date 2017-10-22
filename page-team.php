<?php 
/**
 * Template Name: Team Page
 *
 * @package WordPress
 * @subpackage Agency Themes
 * @
 */ 
get_header(); ?>
	<div id="subPage" class="container">
		<div class="row">
			<div class="subPageLeft col-md-12">
				<?php $staff_args = array(
					'post_type' => 'staff',
					'post_status' => 'publish',
					'posts_per_page' => cs_get_option('team_members_number') ? cs_get_option('team_members_number') : 9
				);
				$staff_query = new WP_Query($staff_args);

				if($staff_query->have_posts()) : 
						
					while($staff_query->have_posts()) : $staff_query->the_post(); 
						$staff_options = get_post_meta(get_the_ID(), '_staff_options', true);  ?>
						<div class="team-member-containing-box col-md-3 col-sm-4">
							<div class="team-member">
								<div class="cover">
									<img src="<?php the_post_thumbnail_url('staff-single'); ?>" alt="robert delavigne">
									<?php if(@$staff_options['staff_email']) : ?>
										<ul class="social-links">
											<li><a href="mailto:<?php echo @$staff_options['staff_email'] ?>"><i class="fa fa-envelope"></i></a></li>
										</ul>
									<?php endif; ?>
								</div>
								<h3 class="name"><a href="<?php the_permalink( ); ?>"><?php the_title(); ?></h3></a>
								<p class="position"><?php echo @$staff_options['staff_position']; ?></p>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>